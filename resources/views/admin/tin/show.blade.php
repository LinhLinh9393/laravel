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
                                <li><a href="#">Xem bài viết</a></li>
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
                            <strong class="card-title">Xem bài viết</strong>
                        </div>
                        <div class="row" style="padding: 25px">
                            <div class="col-lg-12 ">
                                <h2 class="text-center">{{ $tin->title }}</h2><br>
                                <p>"{{ $tin->desc }}"</p>
                                <div>
                                    <img src="{{ Storage::url($tin->img) }}" class="d-block w-100" alt=""
                                        srcset="">
                                </div>
                                <div class=" text mt-3">
                                    <p>{{ $tin->content }}</p>
                                </div>
                                <div class=" text mt-3" style="font-family: ui-serif; text-align: end; margin-right: 40px;">
                                    <h4>Tác giả: {{ $tin->tac_gia }}</h4>
                                </div>

                                <a href="{{ route('tin.index') }}"><button class="btn-primary">Quay lại</button></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
