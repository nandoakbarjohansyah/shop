<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Province;
use App\City;
use App\District;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Transactions\DbTransactionHandler;
use Illuminate\Support\Facades\DB;
use App\Mail\CustomerRegisterMail;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('charts'), true);
        $carts = $carts != '' ? $carts : [];
        return $carts;
    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        $carts = $this->getCarts();
        
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
        }

        $cookie = cookie('charts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    public function listCart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        $data['menu'] = 'cart';
        $data['view'] = 'ecommerce.cart';
        return view('layout.app', $data, compact('carts', 'subtotal'));
    }

    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('charts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    public function checkout(Request $request)
    {
        if (auth()->guard('customer')->check()) {
            $provinces = Province::orderBy('created_at', 'DESC')->get();
            $cities = City::orderBy('created_at', 'DESC')->get();
            $districts = District::orderBy('created_at', 'DESC')->get();
            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function ($q) {
                return $q['qty'] * $q['product_price'];
            });
            $data['menu'] = 'checkout';
            // $data['view'] = 'ecommerce.checkout';
            return view('ecommerce.checkout', $data, compact('provinces', 'cities', 'districts', 'carts', 'subtotal'));
        } else {
            return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    public function processCheckout(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id'
        ]);

        DB::beginTransaction();

        try {
        
            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function ($q) {
                return $q['qty'] * $q['product_price'];
            });

            $order = Order::create([
                'invoice' => Str::random(4) . '-' . time(),
                'customer_id' => $request->id,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'district_id' => $request->district_id,
                'subtotal' => $subtotal
            ]);

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    'weight' => $product->weight
                ]);
            }

            DB::commit();

            $carts = [];
            $cookie = cookie('charts', json_encode($carts), 2880);
            // Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));

            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function checkoutFinish($invoice)
    {
        $order = Order::with(['district.city'])->where('invoice', $invoice)->first();
        $data['view'] = 'ecommerce.checkout_finish';
        $data['menu'] = 'confirmation';
        return view('layout.app', $data, compact('order'));
    }

    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }
}
