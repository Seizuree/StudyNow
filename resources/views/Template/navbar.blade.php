<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/navbarStyle.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <div class="navbar-brand">
            <a href="/"><img src="{{ Storage::url('assets/StudyNow.png') }}"></a>
        </div>
        <div class="navbar-content">
            <div class="navbar-menu-container">
                <a href="/courselist" class="navbar-menu sign">Course list</a>
                @if (Auth::check() == true && Auth::user()->role == 'Admin')
                    <a href="/manageCourse" class="navbar-menu sign">Manage Course</a>
                @endif
            </div>
            <form class="searchbox" role="search" method="GET" action="/search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn-outline-success" type="submit"><img
                        src="{{ Storage::url('assets/magnifying-glass-solid.svg') }}" alt="search icon"></button>
            </form>
            <div class="navbar-menu-container">
                @if (Auth::check() == false)
                    <a id="Login" href="/login" class="navbar-menu sign">Login</a>
                    <a id="SignUp" href="/user/create" class="navbar-menu sign">Sign Up</a>
                @else
                    <div class="dropdown">
                        <img class="profilepic"
                            src="{{ Storage::url('assets/user-solid.svg') }}"
                            alt="user profile">
                        <div class="dropdown-menu">
                            <p>Hi, {{ auth()->user()->name }}</p>
                            <hr class="solidmenu">
                            <a href="{{ url('user/' . auth()->user()->id) . '/edit' }}">Your Profile</a>
                            <a href="/usercourse">My Courses</a>
                            <a href="/logout">Log Out</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>
