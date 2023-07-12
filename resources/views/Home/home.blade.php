@extends('Template.navbar')

@section('title', 'StudyNow: Home')

<link rel="stylesheet" href="/css/homeStyle.css">
@section('content')
    <p>Information</p>
    <div class="outside-carousel">
        <div id="hero-carousel" class="carousel slide carousel-slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="{{ Storage::url('img/info.png') }}" class="c-img" alt="...">
                </div>
                <div class="carousel-item c-item">
                    <img src="{{ Storage::url('img/info2.png') }}" class="c-img" alt="...">
                </div>
                <div class="carousel-item c-item">
                    <img src="{{ Storage::url('img/info3.png') }}" class="c-img" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="space"></div>
    <p>Popular</p>
    <div class="outside-course-list">
        <div class="container">
            @foreach ($courses as $course)
                <a href="{{ url('course/' . $course->id) }}">
                    @if ($course->id < 3)
                        <div class="col">
                            <div class="card radius-15" id="card1">
                                <div class="p-4 border radius-15">
                                    <img src="{{ Storage::url('img/Courses/' . $course->course_image) }}"
                                        class="d-block w-100" alt="Course-image">
                                    <div class="course-name">{{ $course->course_name }}</div>
                                    <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                            class="list-inline-item bg-facebook text-white border-0"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                                class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                                class="bx bxl-linkedin"></i></a>
                                    </div>
                                    <div class="d-grid"> <a href="{{ url('course/' . $course->id) }}"
                                            class="blue-button">Course detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
@endsection
