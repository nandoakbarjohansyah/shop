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
<!-- breadcrumb start-->
<!--================ confirmation part start =================-->
<section class="confirmation_part section_padding">
	<div class="col-lg-12">
		<div class="confirmation_tittle">
			<h3 class="text-center">Thank you. Your order has been received.</h3>
		</div>
	</div>
	<div class="container bg-white rounded shadow p-4">
		<div class="row">
			<div class="col-lg-6 col-lx-4">
				<div class="single_confirmation_details">
					<h4>order info</h4>
					<ul>
						<li>
							<p>Invoice</p><span>: {{ $order->invoice }}</span>
						</li>
						<li>
							<p>Data</p><span>: {{ $order->created_at }}</span>
						</li>
						<li>
							<p>Total</p><span>: Rp {{ number_format($order->subtotal) }}</span>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-lx-4">
				<div class="single_confirmation_details">
					<h4>Billing Address</h4>
					<ul>
						<li>
							<p>Street</p><span>: {{ $order->customer_address }}</span>
						</li>
						<li>
							<p>city</p><span>: {{ $order->district->city->name }}</span>
						</li>
						<li>
							<p>country</p><span>: Indonesia</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
	</div>
</section>
<!--================ confirmation part end =================-->
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
<!--::subscribe_area part end::-->