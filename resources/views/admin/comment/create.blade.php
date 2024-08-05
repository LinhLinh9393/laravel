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
                                <li><a href="#">Bình luận</a></li>
                                <li><a href="#">Bình luận bài viết</a></li>
                                <li class="active">Thêm bình luận bài viết</li>
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
                            <strong class="card-title">Thêm bình luận</strong>
                        </div>

                        <form action="{{ route('comment.store') }}" method="post" class="form" style="padding: 25px;">
                            @csrf

                            <label for="tin_id">Select Article:</label>
                            <select name="tin_id" id="tin_id" class="form-control" required>
                                @foreach ($tins as $tin)
                                    <option value="{{ $tin->id }}">{{ $tin->title }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name="tin_id" id="tin_id"> --}}
                            <label for="content">Nội dung bình luận</label>
                            <input type="text" class="form-control" name="content" id="content"><br>
                            @error('content')
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
