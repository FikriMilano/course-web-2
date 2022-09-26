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
        <a class="nav-link" href="/education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Projects</h1>
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <h3>
                <a href="/projects/{{$project->id}}">{{$project->title}}</a>
            </h3>
            <small>Revenue: {{$project->revenue}}</small> <br>
            <small>Tech used: {{ $project->tech }}</small> <br><br>
            <a class="btn btn-primary" href="/projects/{{$project->id}}/edit">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Delete
            </button>
            <br><br>

            @section('modal-title')
                Penghapusan Data
            @endsection
            @section('modal-message')
                Yakin hapus project {{$project->title}}?
            @endsection
            @section('modal-action')
                <form action="{{route('projects.destroy', $project->id)}}" method="POST">
                    @method('DELETE')
                    {{csrf_field()}}

                    <input type="hidden" name="id" value="{{$project->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endsection
        @endforeach
    @endif
@endsection
