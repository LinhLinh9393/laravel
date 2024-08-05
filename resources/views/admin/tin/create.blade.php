@extends('admin.layouts.app')

@section('content')
    <h1>Thêm mới</h1>

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
                                <li><a href="#">Thêm bài viết</a></li>
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
                            <strong class="card-title">Thêm bài viết</strong>
                        </div>

                        <form action="{{ route('tin.store') }}" method="post" class="form" style="padding: 25px;"
                            enctype="multipart/form-data">
                            @csrf

                            <label for="title">Tên bài viết</label>
                            <input type="text" class="form-control" name="title" id="title"><br>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror


                            <label for="img">Ảnh</label>
                            <input type="file" class="form-control" name="img" id="img"><br>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="tac_gia">Tác giả</label>
                            <input type="text" class="form-control" name="tac_gia" id="tac_gia"><br>
                            @error('tac_gia')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="desc">Tóm tắt</label>
                            <textarea rows="3" type="text" class="form-control" name="desc" id="desc"></textarea><br>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="content">Bài viết</label>
                            <textarea rows="30" type="text" class="form-control" name="content" id="content"></textarea><br>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <label for="id_categories">Danh mục</label>
                            <select id="id_categories" class="form-control" name="id_categories">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('id_categories') == $category->id ? 'selected' : '' }}>{{ $category->title }}
                                    </option>
                                @endforeach
                            </select><br>
                            @error('id_categories')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <input type="submit" value="Thêm mới">

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
