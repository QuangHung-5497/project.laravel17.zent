@extends('backend.layouts.master')
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
<!-- Content -->
@endsection

@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('backend.product.create')}}"><button type="button" class="btn btn-primary btn-sm">Thêm sản phẩm</button></a>
                        

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Thời gian</th>
                                <th>Status</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Loại</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{route('fontend.pages.product', $product->id)}}">{{$product->name}}</a></td>
                                    <td><img src="/{{$product->image}}" width="100px" height="100px"></td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        @if($product->status==1)
                                            Còn hàng
                                        @else
                                            Hết hàng

                                        @endif
                                    </td>
                                    <td>{{$product->origin_price}}</td>
                                    <td>{{$product->sale_price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <a href="{{route('backend.product.edit', $product->id)}}"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('backend.product.destroy', $product->id)}}"><i class="fas fa-trash-alt"></i></a>
                                        <br>
                                        <a href="{{route('backend.image.edit', $product->id)}}"><i class="fas fa-image"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection


