@extends('backend.layouts.master')

@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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
                        <a href="{{route('backend.category.create')}}"><button type="button" class="btn btn-primary btn-sm">Thêm danh mục</button></a>

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
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Thời gian</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                  <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if($category->parent_id==0)
                                            {{$category->name}}
                                        @else
                                            @foreach($category_name as $cate)
                                                @if($category->parent_id==$cate->id)
                                                    {{$cate->name}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <a href="{{route('fontend.pages.shop', $category->slug )}}"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('backend.category.edit', $category->id)}}"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('backend.category.destroy', $category->id)}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                  </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                        {!! $categories->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection