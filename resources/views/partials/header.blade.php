<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('global.site_name')}}</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/png">    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".mobile-menu-toggle").click(function() {
            $(".mobile-menu").slideToggle();
        });
    });
</script>
</head>
<body>
<header>
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" width="30" height="30">
    <h1>{{config('global.site_name')}}</h1>
    <div class="mobile-menu-toggle">
            <div class="hamburger-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60" viewBox="0 0 16 16">
<path fill="#c2e8ff" d="M0.5 5.5H15.5V7.5H0.5z"></path><path fill="#7496c4" d="M15,6v1H1V6H15 M16,5H0v3h16V5L16,5z"></path><path fill="#c2e8ff" d="M0.5 0.5H15.5V2.5H0.5z"></path><path fill="#7496c4" d="M15,1v1H1V1H15 M16,0H0v3h16V0L16,0z"></path><g><path fill="#c2e8ff" d="M0.5 10.5H15.5V12.5H0.5z"></path><path fill="#7496c4" d="M15,11v1H1v-1H15 M16,10H0v3h16V10L16,10z"></path></g>
</svg></div>
        </div>
    <div class="search-bar-container">
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>
    </div>
</header>
<nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('aboutus') }}">About Us</a>
        @auth 
        <a href="#">Academics</a>
        @endauth
        <a href="{{ route('events.index') }}">Events</a>
        <a href="#">Contact</a>
        @auth 
        <button style="display:none">
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" >Logout</button>
                    </form>                       
        </button>
        <a href="{{ route('dashboard') }}"><span> Welcome {{auth()->user()->firstname}} !</span></a>
        @else
        <button onclick="location.href='{{ route('register') }}'">Register</button>
        <button onclick="location.href='{{ route('login') }}'">Login</button>
        @endauth
    </nav>
    
    <nav class="mobile-menu">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('aboutus') }}">About Us</a>
        @auth 
        <a href="#">Academics</a>
        @endauth
        <a href="{{ route('events.index') }}">Events</a>
        <a href="#">Contact</a>
        @auth 
        <button style="display:none">
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" >Logout</button>
                    </form>                       
        </button>
        <a href="{{ route('dashboard') }}"><span> Welcome {{auth()->user()->firstname}} !</span></a>
        @else
        <button onclick="location.href='{{ route('register') }}'">Register</button>
        <button onclick="location.href='{{ route('login') }}'">Login</button>
        @endauth
    </nav>

    <style>

/* 
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.forgot-password {
    margin-top: 10px;
    text-align: right;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container button {
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
 */
</style>