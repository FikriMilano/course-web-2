@extends('layouts.app')
@section('title')
    <title>Portfolio</title>
@endsection
@section('nav-items')
    <li class="nav-item">
        <a class="nav-link active" href="/home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Home</h1>
    <p class="lead">{{$home->description}}</p>
@endsection


