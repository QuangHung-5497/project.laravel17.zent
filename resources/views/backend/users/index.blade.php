@extends('backend.layouts.master')

@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
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
                        <a href="{{route('backend.user.create')}}"><button type="button" class="btn btn-primary btn-sm">Thêm người dùng</button></a>

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
                                <th>Email</th>
                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
                                <th>Thời gian</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><img src="/{{$user->avata}}" width="100px" height="100px"></td>
                                    <td>{{$user->created_at}}</td>  
                                        @if($user->is_admin==1)
                                           <td style="color: red">Admin</td>
                                        @else
                                        <td>Nhân viên</td>
                                        @endif
                                    <td>
                                        <a href="{{route('backend.user.detail', $user->user_name)}}"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('backend.user.edit', $user->id)}}"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('backend.user.destroy', $user->id)}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection