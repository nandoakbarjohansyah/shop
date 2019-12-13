<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home / {{ $menu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cat_product_area section_padding border_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach ($categories as $category)
                                <li class="sub-menu">
                                    <a href="#Electronics" class=" d-flex justify-content-between">
                                        {{ $category->name }}
                                        <div class="right ti-plus"></div>
                                    </a>
                                    <ul>
                                        @foreach ($category->child as $child)
                                        <li>
                                            <a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                        <div class="l_w_title">
                            <h3>Product filters</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <p>Brands</p>
                                @foreach ($categories as $category)
                                @foreach ($category->child as $child)
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a>
                                </li>
                                @endforeach
                                @endforeach
                            </ul>
                            <ul class="list">
                                <p>color</p>
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="#">Black</a>
                                </li>
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="#">Black Leather</a>
                                </li>
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="#">Black with red</a>
                                </li>
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="#">Gold</a>
                                </li>
                                <li>
                                    <input type="radio" aria-label="Radio button for following text input">
                                    <a href="#">Spacegrey</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu product_bar_item">
                                <h2>Products ({{ $count }})</h2>
                            </div>
                        </div>
                    </div>
                    @forelse ($products as $row)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_category_product">
                            <div class="single_category_img">
                                <a href="{{ url('/product/' . $row->slug) }}"> <img src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}"></a>
                                <div class="category_product_text">
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <h5><a class="text-center text-dark text-uppercase" href="{{ url('/product/' . $row->slug) }}">{{ $row->name }}</a></h5>
                                    </a>
                                    <p>RP. {{ number_format($row->price) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                    @endforelse
                </div>
                <div class="row">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

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