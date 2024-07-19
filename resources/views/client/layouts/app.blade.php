<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.layouts.client.css')
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <div class="nav">
        @include('client.layouts.client.nav')
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
       @include('client.layouts.client.footer')
    </div>

    <!-- JavaScript Libraries -->
    @include('client.layouts.client.js')
</body>
</html>
