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
    <h1 class="display-4">Edit Blog Post</h1>
    <form method="POST" action="{{ route('posts.update') }}"> {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
