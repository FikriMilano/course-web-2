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
    <h1 class="display-4">Forgot Password</h1>
{{--    <div class="row justify-content-center">--}}
{{--        <h3 class="text-center my-2">Tutorial Queue Laravel</h3>--}}
{{--        <div class="col-md-4 p-4">--}}
            {{-- send email --}}
            @if(session('status'))
                <div class="alert alert-primary" role="start">
                    {{ session('status')  }}
                </div>
            @endif

            <form action="{{ route('post-email') }}" method="post">
                @csrf
                <div class="form-group">
{{--                    <label for="name">Nama</label>--}}
                    <input type="hidden" class="form-control" name="name" id="name" placeholder="Nama" value="Forgot Password">
                </div>
                <div class="form-group my-3">
                    <label for="email">Email Tujuan</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Tujuan">
                </div>
                <div class="form-group my-3">
{{--                    <label for="body">Deskripsi</label>--}}
                    <input type="hidden" class="form-control" name="body" id="body" value="">
{{--                    <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>--}}
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Kirim Email</button>
                </div>
            </form>
{{--        </div>--}}
{{--    </div>--}}
@endsection
