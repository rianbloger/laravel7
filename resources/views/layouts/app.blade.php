<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
{{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="/css/bootstrap.min.css">
@yield('head')
</head>

<body>
    @include('layouts.navigation')
    <div class="py-4">
        @yield('content')
    </div>
    @yield('script')
</body> 

</html>