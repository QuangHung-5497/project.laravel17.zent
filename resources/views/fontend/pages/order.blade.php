
@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_responsive.css">
@endsection
@section('content')
	<form action="{{route('fontend.pages.order_store')}}">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
         <label for="exampleInputEmail1">Tên</label>
         <input type="text" class="form-control" id="" placeholder="Tên danh mục" name="name">
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Dia chi</label>
         <input type="text" class="form-control" id="" placeholder="Tên danh mục" name="address">
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">So dien thoai</label>
         <input type="text" class="form-control" id="" placeholder="Tên danh mục" name="phone">
      </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
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