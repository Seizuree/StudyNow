@extends('Template.navbar')

@section('title', 'StudyNow: Course Detail')

@section('content')
    <link rel="stylesheet" href="/css/courseDetailStyle.css">
    @php
        $course = $CourseInfo[0];
        $subscribe = $CourseInfo[1];
        $session = $CourseInfo[2];
    @endphp
    <div class="outer-container">
        <div class="course-info-container">
            <div class="course-detail-image-container">
                <img src="{{ Storage::url('img/Courses/' . $course->course_image) }}" alt="Course-image"
                    class="course-detail-image">
            </div>
            <div class="course-detail-text-container">
                <div class="course-detail-title">{{ $course->course_name }}</div>
                @if ($course->rating == 0 && $course->course_subscriber == 0)
                    <div class="course-detail-rating">no rating </div>
                @else
                    @php
                        $rating = $course->course_rating / $course->course_subscriber;
                    @endphp
                    <div class="course-detail-rating">{{ number_format((float) $rating, 1, '.', '') }} </div>
                @endif
                <div class="course-detail-description">{{ $course->course_description }}</div>
                <div class="btn-container">
                    <div class="subscribe">
                        @if ($subscribe == false)
                            <a href="{{ url('course/subscribe/' . $course->id) }}"><input type="submit"
                                    value="Subscribe course" class="input-btn"></a>
                        @else
                            <form action="{{ url('usercourse/' . $course->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Unsubscribe Course" class="input-btn">
                            </form>
                        @endif
                    </div>
                    @if (Auth::user()->role == 'Admin')
                        <div class='edit-course'>
                            <a href="{{ url('course/' . $course->id . '/edit') }}"><input type="submit" value="Edit Course"
                                    class="input-btn"></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="course-session-container">
            <div class="session-container">
                <div class="session-container-btn">
                    @if (sizeof($session) == 0)
                        <div>there is no sessions yet</div>
                    @else
                        @for ($i = 1; $i <= $course->course_session; $i++)
                            <a href="{{ url('coursesession/' . $session[$i - 1]->id) }}" class="session-link-btn">Session
                                {{ $i }}</a>
                            @if ($i + 1 > sizeof($session))
                            @break
                        @endif
                    @endfor
                @endif
            </div>
            <div class="session-content">
                @if (url()->full() == route('course.show', ['course' => $course->id]))
                    @if (sizeof($session) > 0)
                        @php
                            $sessionDetail = $CourseInfo[2][0];
                            $outlines = explode('#', $sessionDetail->session_topics);
                        @endphp
                        <link rel="stylesheet" href="/css/courseSessionStyle.css">
                        <div class="session-container-kanan">
                            <div class="session-title">{{ $sessionDetail->session_title }}</div>
                            <ul>
                                @foreach ($outlines as $outline)
                                    <li class="session-outline">{{ $outline }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="session-container-kiri">
                            <div>Session Sources : </div>
                            <ul>
                                <li>
                                    <a href="{{ $sessionDetail->session_material_link }}" target="_blank">
                                        Session Slides Material
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sessionDetail->session_Vidio_link }}" target="_blank">
                                        Session Vidio Link
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sessionDetail->session_book_link }}" target="_blank">
                                        Session Book Link
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                @else
                    @yield('course-session')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
