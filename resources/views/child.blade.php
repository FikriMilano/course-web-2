@extends('layouts.app')
@section('title', 'Page Title')
    <title>Child Title</title>
@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection
@section('content')
    <p>This is my body content.</p>
@endsection
