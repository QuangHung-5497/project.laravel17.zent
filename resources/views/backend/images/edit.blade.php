@extends('backend.layouts.master')
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách ảnh sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Ảnh sản phâm4</a></li>
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
                        <a href="{{-- {{ route('backend.image.created', $products->id)}} --}}"><button type="button" class="btn btn-primary btn-sm">Thêm sản phẩm</button></a>

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
                        <h3 style="margin-bottom: 100px">Tên sản phẩm: {{$products->name}}</h3>

                        @foreach($images as $img)
                            @if($img->product_id==$products->id)
                                <img src="/{{$img->path}}" width="100px" height="100px">
                                <a href="{{route('backend.image.destroy', $img->id)}}"><i class="fas fa-backspace"></i></a>
                            @endif
                        @endforeach


                            <form role="form" action="{{route('backend.image.stores', $products->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-sucess">Tạo mới</button>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection


