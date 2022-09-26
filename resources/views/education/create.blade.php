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
        <a class="nav-link active" href="/education">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/projects">Projects</a>
    </li>
@endsection
@section('content')
    <h1 class="display-4">Add Education</h1>
    <form action="{{route('education.store')}}" method="POST"> {{csrf_field()}}
        <div class="form-group">
            <label for="school">School name</label>
            <input type="text" class="form-control" id="school" name="school">
        </div>
        <div class="form-group">
            <label for="graduationYear">Graduation year</label>
            <input type="text" class="form-control" id="graduationYear" name="graduationYear">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
