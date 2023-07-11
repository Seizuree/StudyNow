@extends('Template.navbar')

@section('title', 'StudyNow: My Course')

@section('content')
    <link rel="stylesheet" href="/css/myCourseStyle.css">
    <div class="container mb-3 mt-3">
    </div>
    <div class="container grid-container">
        <h2 class="title">My Course : </h2>
        <div class="row">
            @foreach ($usercourses as $mycourse)
                <div class="col-12 col-md-6 col-lg-4" style="min-height:50% ">
                    <div class="card">
                        <img class="card-img-top courseimage"
                            src="{{ Storage::url('img/Courses/' . $mycourse->course->course_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mycourse->course->course_name }}</h5>
                            <p class="card-text">{{ $mycourse->course->course_description }}</p>
                            </br>
                            <div class="button-container">
                                <a type="button" class="btn btn-sm btn-outline-secondary"
                                    href="{{ url('course/' . $mycourse->course->id) }}">Open Course</a>
                                <form action="{{ url('usercourse/' . $mycourse->course->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-outline-secondary"
                                        value="Unsubscribe Course">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
