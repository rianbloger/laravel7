<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title')</title> --}}
    <title> {{ $title ?? 'Rian' }} </title>
{{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/select2/dist/css/select2.min.css">
<style>
    .w-5{
        height: 25px;
    }
    .flex.justify-between.flex-1{
        display: none;
    }
</style>
@yield('head')
</head>

<body>
    @include('layouts.navigation')
    <div class="py-4">
        
        @include('alert')

        @yield('content')
    </div>
    <script src="/jquery/jquery-3.5.1.js"></script>
    <script src="/select2/dist/js/select2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                placeholder: 'choose some tags'
            });
        })
    </script>
    @yield('script')
</body> 

</html>