@extends('layouts.app')
@section('title','home')
@section('content')
<div class="container">
    {{-- <?= "My name is ". htmlspecialchars($name) ?> --}}
    My name is {{$name}}
</div>
    
@endsection