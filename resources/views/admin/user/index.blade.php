@extends('admin.layouts.app')

@section('content')

<h1>Danh sách tài khoản</h1>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tài khoản</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Quản lý tài khoản</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <a href="{{ route('user.create') }}"><button class="btn btn-primary">Thêm mới</button></a>
        @if(session('msg'))
            <h2>{{ session('msg') }}</h2>
        @endif
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý tài khoản</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên tài khoản</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>Created_at</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item -> id }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> email }}</td>
                                    <th>{{ $item -> role ? 'admin' : 'member'}}</th>
                                    <td>{{ $item -> created_at }}</td>
                                    <td style="display: ruby-text;">
                                        <a href="{{ route('user.edit', $item) }}"><button class="btn btn-warning">Sửa</button></a>
                                        <form action="{{ route('user.destroy', $item) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc cắc muốn xoá không?')">Xoá</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>

                    {{ $data -> links() }}
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


@endsection
