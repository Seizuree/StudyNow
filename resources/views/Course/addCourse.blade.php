@extends('Template.navbar')

@section('title', 'StudyNow: Add Course')

@section('content')
    <link rel="stylesheet" href="/css/editCourseStyle.css" />
    <script src="/js/addGameScript.js"></script>
    <div class="update-container">
        <h1 class="title">Add New Course</h1>
        <form action="{{ url('course/') }}" method="post" class="form-update" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <label class="form-label" for="CourseName">Course name</label>
                <input type="text" name="CourseName" class="form-input" />
            </div>
            <div class="form-content">
                <label class="form-label" for="photo">Photo</label>
                <input type="file" name="photo" class="photo" />
            </div>
            <div class="form-content">
                <label class="form-label" for="CourseDescription">Course Description</label>
                <textarea type="text" name="CourseDescription" class="form-input"cols="40"></textarea>
            </div>
            <div class="form-content">
                <label class="form-label" for="CourseSession">Course Session</label>
                <input type="number" name="CourseSession" class="form-input" />
            </div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="submit" value="Add New Course">
        </form>
    </div>
@endsection
