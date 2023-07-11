@extends('Template.navbar')

@section('title', 'StudyNow: Sign In')

@section('content')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="/css/loginStyle.css">
    <div class="center">
        <h1>Login</h1>
        <form action="/login" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
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
            <div class="remember">
                <input type="checkbox" name="remember_me">
                <label class="checkbox-label" for="">Remember Me</label>
            </div>
            <div class="register">
                <p>Don't have a account <a href="/register">Register</a></p>
            </div>
            <input type="submit" value="Login"></input>
            @if ($errors->any())
                <div style="color:red">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
@endsection
