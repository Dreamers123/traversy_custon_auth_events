<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        @if (Auth::check())
            <a class="navbar-brand" href="#">{{Auth::user()->name}}</a>
        @endif
    </nav>
    @include('layouts.session')
</div>
@endsection
</html>
