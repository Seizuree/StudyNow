<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSession;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Home.home')->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Course.addCourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'CourseName' => 'required',
            'CourseDescription' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'CourseSession' => 'numeric|min:1',
        ]);

        $courseName = $request->CourseName;
        $courseDescription = $request->CourseDescription;
        $courseImage = $request->file('photo');
        $courseSession = $request->CourseSession;

        Storage::putFileAs('/public/img/Courses/', $courseImage, $courseImage->getClientOriginalName());

        DB::table('courses')->insert([
            'course_name' => $courseName,
            'course_image' => $courseImage->getClientOriginalName(),
            'course_session' => $courseSession,
            'course_description' => $courseDescription,
            'created_at' => now()
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subscribeCheck = UserCourse::where('course_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($subscribeCheck) {
            $subscribeCheck = true;
        } else {
            $subscribeCheck = false;
        }
        $courseSession = CourseSession::where('course_id', $id)->get();
        $courseInfo = [Course::find($id), $subscribeCheck, $courseSession];
        return view('Course.CourseDetail')->with('CourseInfo', $courseInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('Course.editCourse')->with('course', Course::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'CourseName' => 'required',
            'CourseDescription' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
            'CourseSession' => 'numeric|min:1',
        ]);
        $courseName = $request->CourseName;
        $courseDescription = $request->CourseDescription;
        $courseImage = $request->file('photo');
        $courseSession = $request->CourseSession;
        $course = Course::find($id);
        if ($courseImage != null) {
            if (Storage::exists('/public/img/Courses/' . $course->course_image)) {
                dd("exist");
                Storage::delete('/public/img/Courses/' . $course->course_image);
            }
            Storage::putFileAs('/public/img/Courses/', $courseImage, $courseImage->getClientOriginalName());
            $courseImage = $courseImage->getClientOriginalName();
        } else {
            $courseImage = $course->course_image;
        }

        DB::table('courses')->where('id', $course->id)->update([
            'course_name' => $courseName,
            'course_image' => $courseImage,
            'course_session' => $courseSession,
            'course_description' => $courseDescription,
            'updated_at' => now()
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Course::destroy($id);
        return redirect('/');
    }
}
