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
    <h1 class="display-4">Gallery</h1>
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="card-title">{{$menu}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(count($galleries)>0)
                            @foreach($galleries as $gallery)
                                <div class="col-sm-2">
                                    <div>
                                        <a href="{{ asset('public/storage/education_image/' . $gallery->picture) }}"
                                           class="example-image-link" data-lightbox="example-2"
                                           data-title="{{ $gallery->description }}">
                                            <img src="{{ asset('public/storage/education_image/' . $gallery->picture) }}"
                                                 alt="image-1" class="example-image img-fluid mb-2">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>Tidak ada data.</h3>
                        @endif
                        <div class="d-flex">
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
