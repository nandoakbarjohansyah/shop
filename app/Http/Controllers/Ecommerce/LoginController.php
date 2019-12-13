<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\City;
use App\District;
use App\Province;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Mail\CustomerRegisterMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (auth()->guard('customer')->check()) return redirect(route('customer.dashboard'));
        $data['menu'] = 'Login';
        $data['view'] = 'ecommerce.login';
        return view('layout.app', $data);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');
        $auth['status'] = 1;

        if (auth()->guard('customer')->attempt($auth)) {
            return redirect()->intended(route('front.index'));
            return view('front.index');
        }
        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }

    public function dashboard()
    {
        return view('ecommerce.dashboard');
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect()->back()->with(['success' => 'anda telah logout']);
    }

    public function formRegis()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $password = Str::random(8);
        $customer = Customer::create([
            'name' => $request->customer_name,
            'email' => $request->email,
            'password' => $password,
            'phone_number' => $request->customer_phone,
            'address' => $request->customer_address,
            'district_id' => 6206,
            'activate_token' => Str::random(30),
            'status' => false
        ]);

        return redirect()->back()->with(['success' => 'Berhasil silahkan cek email anda']);
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
