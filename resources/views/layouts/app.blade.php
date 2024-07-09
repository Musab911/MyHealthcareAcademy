<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyHealthcareAcademy</title>
    <link href="{{ asset('assets/css/frontend.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    @stack('styles')
    <!-- Stack for additional styles -->
</head>

<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" />

        </div>
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('apply.now') }}">Apply Now</a></li>
            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
            <li><a href="{{ route('about.us') }}">About Us</a></li>
            <li><a href="{{ route('location') }}">Locations</a></li>
        </ul>
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </nav>
    <div class="menubar">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('apply.now') }}">Apply Now</a></li>
            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
            <li><a href="{{ route('about.us') }}">About Us</a></li>
            <li><a href="{{ route('location') }}">Locations</a></li>
        </ul>
    </div>

    @yield('content')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>