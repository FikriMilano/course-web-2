@extends('layouts.app')
@section('title')
    <title>Portfolio</title>
@endsection
@section('nav-items')
    <li class="nav-item">
        <a class="nav-link" href="/home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Education</h1>
    <div class="well">
        <h3>
            <a href="/projects/{{$education->id}}">{{$education->school}}</a>
        </h3>
        <small>{{$education->graduationYear}}</small> <br>
        <small>{{$education->description}}</small> <br>
        <img width="400"  src="{{asset('storage/' . $education->picture)}}">
    </div>
@endsection
