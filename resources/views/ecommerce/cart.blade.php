<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home/{{ $menu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<!--================Cart Area =================-->
<section class="cart_area section_padding">
    <div class="container bg-white p-4 rounded shadow">
        <div class="cart_inner">
            <form action="{{ route('front.update_cart') }}" method="post">
                @csrf
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $row)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ asset('storage/products/' . $row['product_image']) }}" alt="{{ $row['product_name'] }}" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $row['product_name'] }}</p>
                                </td>
                                <td>
                                    <h5>Rp {{ number_format($row['product_price']) }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <div class="product_count">
                                            <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                            <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                                            <input type="text" value="{{ $row['qty'] }}" min="0" name="qty[]" id="sst{{ $row['product_id'] }}" max="10" title="Quantity:" class="input-text qty input-number" />
                                            <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp {{ number_format($row['product_price'] * $row['qty']) }}</h5>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak ada belanjaan</td>
                            </tr>
                            @endforelse
                            <tr class="bottom_button">
                                <td>
                                    @if(!empty($carts))
                                    <button class="btn btn-success btn_1">Update Cart</button>
                                    @else

                                    @endif
                            </tr>
            </form>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <h5>Subtotal</h5>
                </td>
                <td>
                    <h5>Rp {{ number_format($subtotal) }}</h5>
                </td>
            </tr>
            </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
                @if(!empty($carts))
                <a class="btn_1 checkout_btn_1" href="{{ route('front.checkout') }}">Proceed to checkout</a>
                <a class="btn_1" href="{{ route('front.product') }}">Continue Shopping</a>
                @else
                <a class="btn_1" href="{{ route('front.product') }}">Continue Shopping</a>
                @endif
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->