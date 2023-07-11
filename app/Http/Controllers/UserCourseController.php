<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usercourses = UserCourse::all();
        return view('Account.mycoursepage')->with('usercourses', $usercourses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $courseId = $id;
        $userId = Auth::user()->id;
        UserCourse::where('course_id', $id)->where('user_id', $userId)->delete();
        return redirect()->back();
    }

    /**
     * Store a newly subscribed course
     */
    public function subscribeCourse(Request $request)
    {
        $courseId = $request->route('courseId');
        $userId = Auth::user()->id;
        $userCourse = new UserCourse;
        $userCourse->user_id = $userId;
        $userCourse->course_id = $courseId;
        $userCourse->created_at = now();
        $userCourse->save();
        return redirect()->back();
    }

    /**
     * check if the user already subscribe the course
     */
    public function subscribeCheck()
    {
    }
}
