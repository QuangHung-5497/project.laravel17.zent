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
                        <h3 class="card-title">Sản phẩm</h3>

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
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        @foreach($images as $img)
                                            @if($img->product_id==$product->id)
                                                <img src="/{{$img->path}}" width="100px" height="100px">
                                                <a href="{{route('backend.image.edit', $img->id)}}"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('backend.image.destroy', $img->id)}}"><i class="fas fa-backspace"></i></a>
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{ route('backend.image.created', $product->id)}}">
                                            <button><i class="fas fa-plus-circle"></i></button>
                                        </a>
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


