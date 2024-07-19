@extends('client.layouts.app')

@section('content')

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Website của Linh</h1>
        <div class="row g-4">
            <div class="col-lg-12">
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

                            <h2>{{ $tin -> title }}</h2>
                            <p>"{{ $tin -> desc }}"</p>
                            <div>
                                <img src="{{ asset('client/img/'. $tin -> img) }}" class="d-block w-100" alt="" srcset="">
                            </div>
                            <div class=" text mt-3">
                                <p>{{ $tin -> content }}</p>
                            </div>

                    </div>
                <div class="comment">
                    <div class="detail__comment notPopUp box-comment-v2">
                        <div class="box-comment ykcb" id="ykcb-form">
                            <p class="text">Bình luận</p>
                            @if (session('msg'))
                                    {{ session('msg') }}
                            @endif
                            <form action="{{ route('comments.store', $tin->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="tin_id" id="tin_id">
                                <div class="t-content">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Nhập bình luận" rows="3" name="content"></textarea>
                                </div><br><br>
                                <div class="box-bottom">
                                    <button type="submit" class="btn btn-success">Gửi bình luận</button>
                                </div>
                            </form>
                            <hr>
                            <div class="comment">
                                <p class="text">Bình luận khác</p>
                                @foreach ($binhluan as $bl)
                                    <div class="row form-comment mt-3 ms-3">
                                        <div class="col-lg-2"><p>{{ $bl -> name }}</p></div>
                                        <div class="col-lg-4"> <p>{{ $bl -> content }}</p></div>
                                        <div class="col-lg-3"> <p>{{ $bl -> created_at }} </p></div>
                                        <div class="col-lg-3">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseExample">Xem câu trl</button>
                                            <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Trả lời</button>
                                        </div>
                                    </div>

                                    <div class="collapse mt-4 ms-5"  id="collapse">
                                        @foreach ($bl->replies as $bl2)
                                            <div class="comment-left" style="margin-left: 100px">
                                                <div class="row form-comment" >
                                                    <div class="col-lg-2"><p>{{ $bl2 -> name }}</p></div>
                                                    <div class="col-lg-4"> <p>{{ $bl2 -> content }}</p></div>
                                                    <div class="col-lg-3"> <p>{{ $bl2 -> created_at }} </p></div>
                                                    <div class="col-lg-3">
                                                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseExample">Xem câu trl</button>
                                                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Trả lời</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="collapse mt-4 ms-5" id="collapseExample">
                                        @if (session('msg'))
                                                {{ session('msg') }}
                                        @endif
                                        <form action="{{ route('comments.store', $tin->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="parent_id" id="parent_id" value="{{ $bl-> idbl }}"><br>
                                            <div class="t-content">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Nhập bình luận" rows="3" name="content"></textarea>
                                            </div><br><br>
                                            <div class="box-bottom">
                                                <button type="submit" class="btn btn-success">Gửi bình luận</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                        </div>
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

@endsection
