@extends('layouts.app')

@section('content')
    @yield('body')
@endsection

@section('sidebar')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="websites">
            Websites
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="keywords">
            Keywords
        </a>
    </li>
@endsection
