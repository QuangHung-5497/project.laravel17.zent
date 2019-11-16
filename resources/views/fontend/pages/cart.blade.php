@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_responsive.css">
@endsection
@section('content')
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								@foreach($items as $item)
								<li class="cart_item clearfix">
									
										<div class="cart_item_image"><img src="/fontend/images/shopping_cart.jpg" alt=""></div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											
												<div class="cart_item_name cart_info_col">
													<div class="cart_item_title">Name</div>
													<div class="cart_item_text">{{$item->name}}</div>
												</div>
												<div class="cart_item_color cart_info_col">
													<div class="cart_item_title">Color</div>
													<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
												</div>
												<div class="cart_item_quantity cart_info_col">
													<div class="cart_item_title">Quantity</div>
													<div class="cart_item_text">{{$item->qty}}</div>
												</div>
												<div class="cart_item_price cart_info_col">
													<div class="cart_item_title">Price</div>
													<div class="cart_item_text">{{$item->price}}</div>
												</div>
												<div class="cart_item_total cart_info_col">
													<div class="cart_item_title">Total</div>
													<div class="cart_item_text">{{($item->qty)*($item->price)}}</div>
												</div>
											
										</div>
									
								</li>
								@endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">{{Cart::total()}}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<a href="{{route('fontend.pages.order')}}"><button type="button" class="button cart_button_checkout">Add to Cart</button></a>
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="/fontend/js/jquery-3.3.1.min.js"></script>
	<script src="/fontend/styles/bootstrap4/popper.js"></script>
	<script src="/fontend/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/fontend/plugins/greensock/TweenMax.min.js"></script>
	<script src="/fontend/plugins/greensock/TimelineMax.min.js"></script>
	<script src="/fontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/fontend/plugins/greensock/animation.gsap.min.js"></script>
	<script src="/fontend/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="/fontend/plugins/easing/easing.js"></script>
	<script src="/fontend/js/cart_custom.js"></script>
@endsection