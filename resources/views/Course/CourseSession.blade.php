@extends('Course.CourseDetail')

@section('title', 'StudyNow: Course Session')

@section('course-session')
<link rel="stylesheet" href="/css/courseSessionStyle.css">
    @php
        $sessionDetail = $CourseInfo[3];
        $outlines = explode('#', $sessionDetail->session_topics);
    @endphp
    <div class="session-container-kanan">
        <div class="session-title">{{ $sessionDetail->session_title }}</div>
        <ul>
            @foreach ($outlines as $outline)
                <li class="session-outline">{{ $outline }}</li>
            @endforeach
        </ul>
    </div>
    <div class="session-container-kiri">
        <div class = "learning-materials-title">Session Sources : </div>
        <ul>
            <li>
                <a href="{{ $sessionDetail->session_material_link }}" class = "learning-materials-links" target="_blank">
                    Session Slides Material
                </a>
            </li>
            <li>
                <a href="{{ $sessionDetail->session_Vidio_link }}" class = "learning-materials-links" target="_blank">
                    Session Vidio Link
                </a>
            </li>
            <li>
                <a href="{{ $sessionDetail->session_book_link }}" class = "learning-materials-links" target="_blank">
                    Session Book Link
                </a>
            </li>
        </ul>
    </div>
@endsection
