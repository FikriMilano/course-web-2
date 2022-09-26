@extends('layouts.app')
@section('title')
    <title>Projects</title>
@endsection
@section('nav-items')
    <li class="nav-item">
        <a class="nav-link" href="/home">Home</a>
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
    <h1 class="display-4">Edit Project</h1>
    <form action="{{route('projects.update', $project->id)}}" method="POST">
        @method('PUT')
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
        </div>
        <br>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{$project->description}}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="tech">Tech applied into the project</label>
            <input type="text" class="form-control" id="tech" name="tech" value="{{$project->tech}}">
        </div>
        <br>
        <div class="form-group">
            <label for="members">Team member</label>
            <input type="text" class="form-control" id="members" name="members" value="{{$project->members}}">
        </div>
        <br>
        <div class="form-group">
            <label for="revenue">Revenue</label>
            <input type="text" class="form-control" id="revenue" name="revenue" value="{{$project->revenue}}">
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
