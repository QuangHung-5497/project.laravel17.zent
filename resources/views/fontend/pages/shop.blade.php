@extends('fontend.layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins//fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins//OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins//OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins//OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins//jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/shop_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/shop_responsive.css">
@endsection

@section('content')
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="/fontend/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Smartphones & Tablets</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								@foreach($category_con as $category)
									<li><a href="{{route('fontend.pages.shop', $category->slug)}}">{{$category->name}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach($categories as $category)
									@if($category->parent_id==0)
										<li class="brand"><a href="{{route('fontend.pages.shop', $category->slug)}}">{{$category->name}}</a></li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{$product_found->count()}}</span> products found</div>
							<div class="shop_sorting">
								<span>Sắp xếp:</span>
								<ul>
									<li>
										<span class="sorting_text">Đánh giá cao nhất<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Đánh giá cao nhất</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Tên sản phẩm</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>Giá</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<!-- Product Item -->
							@foreach($product_found as $product)
								<a href="{{route('fontend.pages.product', $product->id)}}">
									<div class="product_item is_new">
										<div class="product_border"></div>
										<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/{{$product->image}}" alt=""></div>
										<div class="product_content">
											<div class="product_price">{{$product->sale_price}}</div>
											<div class="product_name"><div><a href="#" tabindex="0">{{$product->name}}</a></div></div>
										</div>
										<div class="product_fav"><i class="fas fa-heart"></i></div>
										<ul class="product_marks">
											<li class="product_mark product_discount">-25%</li>
											<li class="product_mark product_new">new</li>
										</ul>
									</div>
								</a>
							@endforeach
						</div>
						{!! $product_found->links() !!}

						<!-- Shop Page Navigation -->

						{{-- <div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div> --}}

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							@foreach($product_view as $product)
								
									<div class="owl-item">
										<a href="{{route('fontend.pages.product',$product->id)}}">
										<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
											<div class="viewed_image"><img src="/{{$product->image}}" alt=""></div>
											<div class="viewed_content text-center">
												<div class="viewed_price">{{$product->sale_price}}<span>{{$product->origin_price}}</span></div>
												<div class="viewed_name">{{$product->name}}</div>
											</div>
											<ul class="item_marks">
												<li class="item_mark item_discount">-25%</li>
												<li class="item_mark item_new">new</li>
											</ul>
										</div>
										</a>
									</div>
								
							@endforeach
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

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
	<script src="/fontend/plugins//greensock/TweenMax.min.js"></script>
	<script src="/fontend/plugins//greensock/TimelineMax.min.js"></script>
	<script src="/fontend/plugins//scrollmagic/ScrollMagic.min.js"></script>
	<script src="/fontend/plugins//greensock/animation.gsap.min.js"></script>
	<script src="/fontend/plugins//greensock/ScrollToPlugin.min.js"></script>
	<script src="/fontend/plugins//OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="/fontend/plugins//easing/easing.js"></script>
	<script src="/fontend/plugins//Isotope/isotope.pkgd.min.js"></script>
	<script src="/fontend/plugins//jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="/fontend/plugins//parallax-js-master/parallax.min.js"></script>
	<script src="/fontend/js/shop_custom.js"></script>
@endsection