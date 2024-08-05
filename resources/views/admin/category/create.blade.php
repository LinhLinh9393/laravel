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
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Danh mục</a></li>
                                <li><a href="#">Danh mục bài viết</a></li>
                                <li class="active">Thêm danh mục bài viết</li>
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
                            <strong class="card-title">Thêm danh mục</strong>
                        </div>

                        <form action="{{ route('category.store') }}" method="post" class="form" style="padding: 25px;">
                            @csrf

                            <label for="title">Tên danh mục</label>
                            <input type="text" class="form-control" name="title" id="title"><br>
                            @error('title')
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
