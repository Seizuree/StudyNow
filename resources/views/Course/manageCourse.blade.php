@extends('Template.navbar')

@section('title', 'StudyNow: Manage Course')

@section('content')
    @if (Auth::user()->role == 'Admin')
        <link rel="stylesheet" href="/css/manageCourseStyle.css">
        <div class="manage-game-container">
            <a href="/course/create" class="add-game-link">Add Course</a>
            <div class="game-container">
                <div class="game-title">Course Name</div>
                <div class="pegi-rating">Course Description</div>
                <div class="game-genre">Course Populatiry</div>
            </div>
            @foreach ($Courses as $course)
                <div class="game-content-container">
                    <div class="game-title content-item"><img
                            src="{{ Storage::url('img/Courses/' . $course->course_image) }}" alt="image"
                            class="game-image">
                        {{ $course->course_image }}
                    </div>
                    <div class="pegi-rating content-item">{{ $course->course_description }}</div>
                    @if ($course->rating == 0 && $course->course_subscriber == 0)
                        <div class="game-price content-item">no rating </div>
                    @else
                        @php
                            $rating = $course->course_rating / $course->course_subscriber;
                        @endphp
                        <div class="game-price content-item">{{ number_format((float) $rating, 1, '.', '') }} </div>
                    @endif
                    <a href="{{ url('course/' . $course->id . '/edit') }}" class="edit-link">edit</a>
                    <form action="{{ url('course/' . $course->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="delete-link"
                            style="border: none;background-color:transparent">
                    </form>
                </div>
            @endforeach
    @endif
@endsection
