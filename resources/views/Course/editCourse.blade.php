@extends('Template.navbar')

@section('title', 'StudyNow: Edit Course')

@section('content')
    <link rel="stylesheet" href="/css/editCourseStyle.css" />
    <script src="/js/addGameScript.js"></script>
    <div class="update-container">
        <h1 class="title">Edit Course</h1>
        <form action="{{ url('course/'.$course->id) }}" method="post" class="form-update" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-content">
                <label class="form-label" for="CourseName">Course name</label>
                <input type="text" name="CourseName" class="form-input" value="{{ $course->course_name }}" />
            </div>
            <div class="form-content">
                <label class="form-label" for="photo">Photo</label>
                <input type="file" name="photo" class="photo"/>
            </div>
            <div class="form-content">
                <label class="form-label" for="CourseDescription">Course Description</label>
                <input type="text" name="CourseDescription" class="form-input"cols="40"
                    value="{{ $course->course_description}}"></input>
            </div>
            <div class="form-content">
                <label class="form-label" for="CourseSession">Course Session</label>
                <input type="number" name="CourseSession" class="form-input" value="{{ $course->course_session}}"/>
            </div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="submit" value="Update Course">
        </form>
    </div>
@endsection
