@extends('Template.navbar')

@section('title', 'StudyNow: Sign Up')

@section('content')
    <link rel="stylesheet" href="/css/loginStyle.css">
    <div class="center">
        <h1>Registration</h1>
        <form action="/user" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="txt">
                <input type="text" required name="username">
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt">
                <input type="text" required name="email">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt">
                <input type="password" required name="password">
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt">
                <input type="password" required name="confirmpassword">
                <span></span>
                <label>Confirm Password</label>
            </div>
            <div class="txt">
                <input type="tel" required name="telephone">
                <span></span>
                <label>Phone</label>
            </div>
            <div class="Gender">
                <label for="Gender" class="form-check-label mb-1" style="display: block">Gender</label>
                <input type="radio" class="form-check-input" id="gender" name="gender" value="Male"> Male
                <input type="radio" class="form-check-input" id="gender" name="gender" value="Female"> Female
            </div>
            <div class="dateofbirth">
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="register">
                <p>Already have an account <a href="/login">Login</a></p>
            </div>
            <input type="submit" value="Submit">
            @if ($errors->any())
                <div style="color:red">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
@endsection
