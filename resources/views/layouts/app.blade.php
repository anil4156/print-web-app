<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Web App</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" sizes="16x16">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui-min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<main>
    @yield('content')
</main>


<script src="{{ asset('js/cropper/jquery.js') }}"></script>
<script src="{{ asset('js/cropper/cropper.js') }}"></script>
<script src="{{ asset('js/cropper/main.js') }}"></script>
<script src="{{ asset('js/cropper/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/gsap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
@yield('footer_scripts')
</body>
</html>
