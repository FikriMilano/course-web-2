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
    <h1 class="display-4">Edit Education</h1>
    <form action="{{route('education.update', $education->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        {{csrf_field()}}
        <div class="form-group">
            <label for="school">School name</label>
            <input type="text" class="form-control" id="school" name="school" value="{{$education->school}}">
        </div>
        <br>
        <div class="form-group">
            <label for="graduationYear">Graduation year</label>
            <input type="text" class="form-control" id="graduationYear" name="graduationYear" value="{{$education->graduationYear}}">
        </div>
        <br>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$education->description}}">
        </div>
        <br>
        <div class="form-group">
            <label for="input-file">File input</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="input-file" name="picture">
                    <label for="input-file" class="custom-file-label">Choose file</label>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
