@extends('layouts.ecommerce')

@section('title')
<title>Checkout</title>
@endsection

@section('content')

<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Informasi Pengiriman</h3>
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::guard('customer')->user()->id}}">
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <input readonly type="text" class="form-control" id="first" name="customer_name" value="{{Auth::guard('customer')->user()->name}}" required>
                            <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label>
                            <input readonly value="{{Auth::guard('customer')->user()->phone_number}}" type="text" class="form-control" id="number" name="customer_phone" required>
                            <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">Email</label>
                            <input readonly value="{{Auth::guard('customer')->user()->email}}" type="email" class="form-control" id="email" name="email" required>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <input readonly value="{{Auth::guard('customer')->user()->address}}" type="text" class="form-control" id="add1" name="customer_address" required>
                            <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Propinsi</label>
                            <select value="{{Auth::guard('customer')->user()->phone_number}}" class="form-control" name="province_id" id="province_id" required>
                                <option value="">Pilih Propinsi</option>
                                @foreach ($provinces as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('province_id') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kabupaten / Kota</label>
                            <select class="form-control" name="city_id" id="city_id" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach ($cities as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('city_id') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kecamatan</label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($districts as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('district_id') }}</p>
                        </div>
                        <!-- ADAPUN DATA KOTA DAN KECAMATAN AKAN DI RENDER SETELAH PROVINSI DIPILIH -->

                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Ringkasan Pesanan</h2>
                        <ul class="list">
                            <li>
                                <a href="#">Product
                                    <span>Total</span>
                                </a>
                            </li>
                            @foreach ($carts as $cart)
                            <li>
                                <a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                                    <span class="middle">x {{ $cart['qty'] }}</span>
                                    <span class="last">Rp {{ number_format($cart['product_price']) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Subtotal
                                    <span>Rp {{ number_format($subtotal) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Pengiriman
                                    <span>Rp 0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Total
                                    <span>Rp {{ number_format($subtotal) }}</span>
                                </a>
                            </li>
                        </ul>
                        <button class="main_btn">Bayar Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@endsection