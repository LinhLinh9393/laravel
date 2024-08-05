@extends('admin.layouts.app')

@section('content')
    <h1>Danh sách bài viết</h1>
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Bài viết</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Bài viết</a></li>
                                <li><a href="#">Quản lý bài viết</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="animated fadeIn">
            <a href="{{ route('tin.create') }}"><button class="btn btn-primary">Thêm mới</button></a>
            @if (session('msg'))
                <h2>{{ session('msg') }}</h2>
            @endif
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Quản lý bài viết</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Ảnh</th>
                                        <th>Tác giả</th>
                                        <th>Danh mục</th>
                                        <th>View</th>
                                        <th>Like</th>
                                        <th>Created_at</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <img src="{{ Storage::url($item->img) }}" alt="{{ $item->title }}"
                                                style="width: 500px; ">
                                        </td>
                                        <th>{{ $item->tac_gia }}</th>
                                        <th>{{ $item->id_categories ? $item->category->title : 'Không có trong danh mục' }}
                                        </th>
                                        <th>{{ $item->view }}</th>
                                        <th>{{ $item->like }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td style="display: ruby-text;">
                                            <a href="{{ route('tin.show', $item) }}"><button
                                                    class="btn btn-info">Show</button></a>
                                            <a href="{{ route('tin.edit', $item) }}"><button
                                                    class="btn btn-warning">Sửa</button></a>
                                            <form action="{{ route('tin.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc cắc muốn xoá không?')">Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        {{ $data->links() }}
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
