@extends('layouts.app')
@section('title')
    <title>Portfolio</title>
@endsection
@section('nav-items')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Projects</h1>
    <div class="well">
        <h3>
            <a href="/projects/{{$project->id}}">{{$project->title}}</a>
        </h3>
        <small>Revenue: {{ $project->revenue }}</small> <br>
        <small>Tech used: {{ $project->tech }}</small> <br>
        <small>Team members: {{ $project->members }}</small> <br><br>
        <p>{{$project->description}}</p>
    </div>
@endsection
