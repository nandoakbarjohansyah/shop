@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner_slider">
                    <div class="single_banner_slider">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h5>NandoShop</h5>
                                <h1>Fashion Collection <?= date('Y') ?></h1>
                                <a href="{{ route('front.product') }}" class="btn_1">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part pt-4">
    <div class="container-fluid p-lg-0 overflow-hidden">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-4 col-sm-6">
                <div class="single_feature_post_text">
                    <img src="{{ asset('winter/img/feature_1.png') }}" alt="#">
                    <div class="hover_text">
                        <a href="{{ route('front.product') }}" class="btn_2">shop for male</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_feature_post_text">
                    <img src="{{ asset('winter/img/feature_2.png') }}" alt="#">
                    <div class="hover_text">
                        <a href="{{ route('front.product') }}" class="btn_2">shop for male</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_feature_post_text">
                    <img src="{{ asset('winter/img/feature_3.png') }}" alt="#">
                    <div class="hover_text">
                        <a href="{{ route('front.product') }}" class="btn_2">shop for male</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- new arrival part here -->
<section class="new_arrival section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="arrival_tittle">
                    <h2 class="text-center">new arrival
                        <hr style=" border: 5px solid black; border-radius: 5px;">
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="new_arrival_iner filter-container">
                        @forelse($products as $row)
                        <div class="single_arrivel_item weidth_3 mix women">
                            <img src="{{ asset('storage/products/' . $row->image) }}">
                            <div class="hover_text">
                                <p>{{ $row->category->name }}</p>
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <h3>{{ $row->name }}</h3>
                                </a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>RP. {{ number_format($row->price) }}</h5>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>
                    <div class="row">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new arrival part end -->

<!-- free shipping here -->
<section class="shipping_details section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single_shopping_details">
                    <img src="{{ asset('winter/img/icon/icon_1.png') }}" alt="">
                    <h4>Free shipping</h4>
                    <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_shopping_details">
                    <img src="{{ asset('winter/img/icon/icon_2.png') }}" alt="">
                    <h4>Free shipping</h4>
                    <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_shopping_details">
                    <img src="{{ asset('winter/img/icon/icon_3.png') }}" alt="">
                    <h4>Free shipping</h4>
                    <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_shopping_details">
                    <img src="{{ asset('winter/img/icon/icon_4.png') }}" alt="">
                    <h4>Free shipping</h4>
                    <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- free shipping end -->