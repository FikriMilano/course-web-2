@extends('layouts.app')
@section('title')
    <title>Posts</title>
@endsection
@section('nav-items')
    <li class="nav-item">
        <a class="nav-link active" href="#">Post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="about">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Blog Post</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h3>
                <small>Tanggal: {{$post->created_at}}</small>
                <button class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</button>
            </div>
        @endforeach
    @endif
@endsection


