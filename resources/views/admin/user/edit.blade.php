@extends('admin.layouts.app')

@section('content')
    <h1>Sửa danh mục</h1>

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
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Danh mục</a></li>
                                <li><a href="#">Danh mục bài viết</a></li>
                                <li class="active">Sửa danh mục bài viết</li>
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
                            <strong class="card-title">Sửa tài khoản</strong>
                        </div>

                        <form action="{{ route('user.update', $users) }}" method="post" class="form"
                            style="padding: 25px;">
                            @csrf
                            @method('PATCH')

                            <label for="name">Tên tài khoản</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $users->name }}" readonly><br><br>

                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ $users->email }}" readonly><br><br>

                            <label for="created_at">Created_at</label>
                            <input type="text" class="form-control" name="created_at" id="created_at"
                                value="{{ $users->created_at }}" readonly><br><br>

                            <label for="role">Vai trò</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="0" {{ $users->role == 0 ? 'selected' : '' }}>Member</option>
                                <option value="1" {{ $users->role == 1 ? 'selected' : '' }}>Admin</option>
                            </select><br><br>

                            <input type="submit" value="Sửa tài khoản">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
