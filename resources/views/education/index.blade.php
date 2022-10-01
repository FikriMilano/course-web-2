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
    @if(count($educations) > 0)
        @foreach($educations as $education)
            <h3>
                <a href="/education/{{$education->id}}">{{$education->school}}</a>
            </h3>
            <small>{{$education->graduationYear}}</small> <br>
            <small>{{$education->description}}</small> <br><br>
            <a class="btn btn-primary" href="/education/{{$education->id}}/edit">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Delete
            </button>
            <br><br>

            @section('modal-title')
                Penghapusan Data
            @endsection
            @section('modal-message')
                Yakin hapus education {{$education->school}}?
            @endsection
            @section('modal-action')
                <form action="{{route('education.destroy', $education->id)}}" method="POST">
                    @method('DELETE')
                    {{csrf_field()}}

                    <input type="hidden" name="id" value="{{$education->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endsection
        @endforeach
        Halaman : {{ $educations->currentPage() }} <br />
        Jumlah Data : {{ $educations->total() }} <br />
        Data Per Halaman : {{ $educations->perPage() }} <br />
        <div class="d-flex">
            {{ $educations->links() }}
        </div>
    @endif
@endsection
