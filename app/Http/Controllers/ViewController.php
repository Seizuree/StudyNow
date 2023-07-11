<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function initialPage()
    {
        if (Auth::check()) {
            return view('Home.home')->with('courses', Course::all());
        } else {
            return view('Home.not-logged-in');
        }
    }

    public function showLoginPage()
    {
        return view('Authentication.login');
    }

    public function showRegisterPage()
    {
        return view('Authentication.register');
    }

    public function showCourseListPage()
    {
        return view('Course.CourseList')->with('Courses', Course::all());
    }

    public function showManageCoursePage()
    {
        return view('Course.manageCourse')->with('Courses', Course::all());
    }
}
