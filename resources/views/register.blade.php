@extends('layouts.ecommerce')

@section('title')
<title>Checkout</title>
@endsection


@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Login/Register</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ route('customer.login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form class="row contact_form" action="{{ route('customer.register') }}" method="post" novalidate="novalidate">
    @csrf
    <div class="col-md-12 form-group p_star">
        <label for="">Nama Lengkap</label>
        <input type="text" class="form-control" id="first" name="customer_name" required>
        <p class="text-danger">{{ $errors->first('customer_name') }}</p>
    </div>
    <div class="col-md-6 form-group p_star">
        <label for="">No Telp</label>
        <input type="text" class="form-control" id="number" name="customer_phone" required>
        <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
    </div>
    <div class="col-md-6 form-group p_star">
        <label for="">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <p class="text-danger">{{ $errors->first('email') }}</p>
    </div>
    <div class="col-md-12 form-group p_star">
        <label for="">Alamat Lengkap</label>
        <input type="text" class="form-control" id="add1" name="customer_address" required>
        <p class="text-danger">{{ $errors->first('customer_address') }}</p>
    </div>
    <button type="submit">register</button>
</form>
<!--================End Checkout Area =================-->
@endsection

@section('js')
<script>
    $('#province_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: {
                province_id: $(this).val()
            },
            success: function(html) {

                $('#city_id').empty()
                $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                $.each(html.data, function(key, item) {
                    $('#city_id').append('<option value="' + item.id + '">' + item.name + '</option>')
                })
            }
        });
    })

    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: {
                city_id: $(this).val()
            },
            success: function(html) {
                $('#district_id').empty()
                $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="' + item.id + '">' + item.name + '</option>')
                })
            }
        });
    })
</script>
@endsection