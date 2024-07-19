@extends('client.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 200px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thông báo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       {{ __('Xin chào ') }}{{ Auth::user()->name }}. Bạn đã đăng nhập thành công!


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
