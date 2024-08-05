@extends('client.layouts.app')

@section('content')
    {{-- // banner --}}
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">Tin tức</h4>
                    <h1 class="mb-5 display-3 text-primary">Tin tức hay nhất & mới nhất</h1>
                    <form action="{{ route('search') }}" method="get">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text"
                                name="key" placeholder="Search">
                            <button type="submit"
                                class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                                style="top: 0; right: 25%;">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="client/img/best-product-1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded"
                                    alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Du Lịch</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="client/img/best-product-3.jpg" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Đời sống</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- //content --}}
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Tin tức mới </h1>
                </div>
            </div>
            {{-- {{$tin}} --}}
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($new as $m)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ Storage::url($m->img) }}" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">News</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $m->title }}</h4>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p>{{ $m->desc }}</p>
                                                    <a href="{{ route('chiTiet', $m->id) }}"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">Xem
                                                        ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Vesitable Shop Start-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Tin du lịch</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach ($tinDL as $dl)
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ Storage::url($dl->img) }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Du Lịch</div>
                        <div class="p-4 rounded-bottom">
                            <h4>{{ $dl->title }}</h4>
                            <p>{{ $dl->desc }}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <a href="{{ route('chiTiet', $dl->id) }}"
                                    class="btn border border-secondary rounded-pill px-3 text-primary">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                {{-- @foreach ($top1 as $t1) --}}
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Tin tức</h1>
                        <p class="fw-normal display-3 text-dark mb-4">nổi bật nhất</p>
                        <h4 class="mb-4 text-dark">{{ $top1->title }}</h4>
                        <p class="mb-4 text-dark">{{ $top1->desc }}</p>
                        <a href="{{ route('chiTiet', $top1->id) }}"
                            class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">XEM NGAY</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ Storage::url($top1->img) }}" class="img-fluid w-100 rounded" alt="">
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

    <!-- Banner Section End -->

    <!-- tất cả bài viết -->
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Tin tức </h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        @foreach ($danhmuc as $dm)
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active text-dark text-center"
                                    href="{{ route('content', $dm->id) }}" style="width: 130px; flex-flow: column;">
                                    {{ $dm->title }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($tin as $t)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ Storage::url($t->img) }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>

                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $t->title }}</h4>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p>{{ $t->desc }}</p>
                                                    <a href="{{ route('chiTiet', $t->id) }}"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">Xem
                                                        ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
