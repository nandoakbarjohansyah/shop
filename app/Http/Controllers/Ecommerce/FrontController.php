<?php

namespace App\Http\Controllers\Ecommerce;

use App\Category;
use App\City;
use App\Customer;
use App\District;
use App\Http\Controllers\Controller;
use App\Product;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegisterMail;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(6);
        // $products = Product::with(['category'])->where('slug', $slug)->first();
        $data['menu'] = 'home';
        $data['view'] = 'home.index';
        return view('layout.app', $data, compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['menu'] = 'Detail';
        $data['view'] = 'ecommerce.show';
        $product = Product::with(['category'])->where('slug', $slug)->first();
        return view('layout.app', $data, compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function product()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        $data['view'] = 'ecommerce.product';
        $data['menu'] = 'Products';
        $count = Product::count();
        return view('layout.app', $data, compact('products', 'count'));
    }

    public function categoryProduct($slug)
    {
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        $count = Product::count();
        $data['view'] = 'ecommerce.product';
        $data['menu'] = 'Products';
        return view('layout.app', $data, compact('products', 'count'));
    }

    // public function verifyCustomer($token)
    // {
    //     $customer = Customer::where('activate_token', $token)->first();

    //     if ($customer) {
    //         $customer->update([
    //             'activate_token' => null,
    //             'status' => 1
    //         ]);

    //         return redirect(route('customer.login'))->with(['success' => 'Verifikasi berhasil silahkan login']);
    //     }

    //     return redirect(route('customer.login'))->with((['error' => 'Verifikasi gagal :(']));
    // }

    public function registrasi()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        $cities = City::orderBy('created_at', 'DESC')->get();
        $districts = District::orderBy('created_at', 'DESC')->get();
        $data['menu'] = 'Registrasi';
        $data['view'] = 'home.register';

        return view('layout.app', $data, compact('provinces', 'cities', 'districts'));
    }

    public function processRegistrasi(Request $request)
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

            $customer = Customer::create([
                'name' => $request->customer_name,
                'email' => $request->email,
                'password' => $request->customer_pass,
                'phone_number' => $request->customer_phone,
                'address' => $request->customer_address,
                'district_id' => $request->district_id,
                'status' => 1
            ]);
            
            Mail::to($request->email)->send(new CustomerRegisterMail($customer));
            return redirect(route('front.index'))->with(['success' => 'Akun sudah terbuat silahkan cek email']);
    }

    // public function userview(){
    //     $data['menu'] = 'Detail';
    //     $data['view'] = 'pdf_data';

    //     return view('layout.app', $data);
    // }
}
