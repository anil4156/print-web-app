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
</head>
<body>

<main>
    @yield('content')
</main>

@yield('footer_scripts')

</body>
</html>
