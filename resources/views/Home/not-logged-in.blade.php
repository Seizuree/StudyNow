@extends('Template.navbar')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ url('css/navbarStyle.css') }}" />
    @if (Auth::check() == false)
        <div class="d-flex justify-content-between bg-info">
            <div class="landing-page align-items-center">
                <h1>Welcome to Study Now!</h1>
                <h3>To access all the courses available, click <a href="/login" class="">here</a> to login!</h3>
            </div>
            <div class="text-center w-50">
                <img class="img-fluid mx-auto rounded w-75 mt-5 mb-5" src="{{ Storage::url('assets/study-notebooks.jpg') }}">
            </div>
        </div>
    @endif
@endsection
