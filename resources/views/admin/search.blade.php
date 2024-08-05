@extends('admin.layouts.app')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text ms-5">Kết quả tìm kiếm của "{{ $key }}"</h3><br>
                <div class="title mt-3" style="margin-left: 20px">
                    <h4 class="text">- Danh mục</h4>
                    <div class="row g-4 justify-content-center mt-3">
                        @foreach ($dm as $danhmuc)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{ $danhmuc->title }}</h4><br>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <a href="{{ route('category.index') }}"
                                                class="btn btn-primary border border-secondary rounded-pill px-3 text-bg-light">Xem
                                                ngay quản lý danh mục</a>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="title mt-3" style="margin-left: 20px">
                    <h4 class="text">- Bài viết</h4>
                </div>
                <div class="row g-4 justify-content-center mt-3">
                    @foreach ($tin as $t)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="rounded position-relative fruite-item">
                                <div class="fruite-img">
                                    <img src="{{ Storage::url($t->img) }}" class="img-fluid w-100 rounded-top"
                                        alt="">
                                </div>

                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4>{{ $t->title }}</h4>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p>{{ $t->desc }}</p>
                                        <a href="{{ route('tin.show', $t->id) }}"
                                            class="btn btn-primary border border-secondary rounded-pill px-3 text-bg-light">Xem
                                            ngay</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
