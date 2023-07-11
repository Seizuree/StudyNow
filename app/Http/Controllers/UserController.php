<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Authentication.register');
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
            "username" => "required",
            "email" => "required|unique:users,email",
            "password" => "required | min:8 |alpha_num",
            "gender" => "required",
            "dob" => "required"
        ]);

        $dob = $request->dob;
        if ($dob >= now()) {
            return redirect()->back()->withErrors(new MessageBag(['Date of bith not valid']));
        }

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $confirmpassword = $request->confirmpassword;
        $gender = $request->gender;

        if ($password != $confirmpassword) {
            return redirect()->back()->withErrors(new MessageBag(['Confirm password does not match the password']));
        }

        DB::table('users')->insert([
            'name' => $username,
            'email' => $email,
            'gender' => $gender,
            'dob' => $dob,
            'password' => bcrypt($password),
            'profile_image' => "default profile.png",
            'role' => 'Member',
            'created_at' => now(),
        ]);

        return redirect('login');
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
        return view("Account.profilePage");
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
        $validation = null;
        if ($request->email == Auth::user()->email) {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'userpic' => 'image',
            ]);
        } else {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'userpic' => 'image',
                'email' => 'required|email|unique:users,email',
            ]);
        }
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $Photo = $request->file('userpic');
        $user = User::find(auth()->user()->id);

        if ($Photo != null) {
            if (Storage::exists('public/img/User Profiles/' . $user->image)) {
                Storage::delete('public/img/User Profiles/' . $user->image);
            }
            $Photo = $request->getClientOriginalName();
            Storage::putFileAs('/public/img/User Profiles', $Photo, $Photo->getClientOriginalName());
            $user->image = $Photo;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

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
    }
}
