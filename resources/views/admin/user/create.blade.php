@extends('admin.layouts.app')

@section('content')
    <h1>Thêm mới</h1>

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Tin tức</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Tài khoản</a></li>
                                <li><a href="#">Quản lý tài khoản</a></li>
                                <li class="active">Thêm tài khoản</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm tài khoản</strong>
                        </div>

                        <form action="{{ route('user.store') }}" method="post" class="form" style="padding: 25px;">
                            @csrf

                            <label for="name">Tên tài khoản</label>
                            <input type="text" class="form-control" name="name" id="name"><br>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email"><br>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password"><br>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="role">Vai trò</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                            </select><br><br>

                            <input type="submit" value="Thêm mới">

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
