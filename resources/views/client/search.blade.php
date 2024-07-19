@extends('client.layouts.app')

@section('content')

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Website của Linh</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <form action="{{ route('search') }}" method="get">
                                <div class="position-relative mx-auto">
                                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="key" placeholder="Search" name="key">
                                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                            <div class="col-lg-8 text-end">
                                <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                    @foreach ($danhmuc as $dm)
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill active text-dark text-center"
                                            href="{{ route('content', $dm -> id) }}" style="width: 130px; flex-flow: column;"> {{ $dm -> title }}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <h4 class="mb-3">Mới nhất</h4>
                                @foreach ($new as $m)
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 300px; height: 100px;">
                                            <img src="{{ asset('client/img/'. $m -> img) }}" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <p class="text-danger "><a href="{{ route('chiTiet', $m -> id )}}">  {{ $m -> title }}</a></p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{ asset('client/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Tin tức <br> Mới nhất <br> Chất lượng</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <h4 class="mb-3">Top 5</h4>
                                @foreach ($top5 as $tp)
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 300px; height: 100px;">
                                            <img src="{{ asset('client/img/'. $tp -> img) }}" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <p class="text-danger "><a href="{{ route('chiTiet', $tp -> id )}}"> {{ $tp -> title }}</a></p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 ">
                        <div class="row g-4 justify-content-center">
                            <h3 class="text ms-5">Kết quả tìm kiếm của "{{ $key }}"</h3>
                            @foreach ($tin as $t)
                                <div class="col-md-6 col-lg-6 col-xl-4" >
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{ asset('client/img/'. $t ->img) }}" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>

                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{ $t -> title }}</h4>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p>{{ $t -> desc }}</p>
                                                <a href="{{ route('chiTiet', $t -> id )}}"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">Xem ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="container-fluid vesitable py-5">
                        <div class="container py-5">
                            <h1 class="mb-0">Tin Khác</h1>
                            <div class="owl-carousel vegetable-carousel justify-content-center">
                                @foreach ($tinDL as $dl)
                                    <div class="border border-primary rounded position-relative vesitable-item">
                                        <div class="vesitable-img">
                                            <img src="{{ asset('client/img/'. $dl -> img ) }}" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Khác</div>
                                        <div class="p-4 rounded-bottom">
                                            <h4>{{ $dl -> title }}</h4>
                                            <p>{{ $dl -> desc }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <a href="{{ route('chiTiet', $dl -> id )}}" class="btn border border-secondary rounded-pill px-3 text-primary">Xem ngay</a>
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
</div>

@endsection
