<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyHealthcareAcademy</title>
    <link href="{{ asset('assets/css/frontend.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
</head>

<body>
    <nav>
        <div class="logo">
            <img src="assets/Logo64x64.png" alt="logo" />
            <h1>LOGO</h1>
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Contact Us</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </nav>
    <div class="menubar">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Contact Us</a>
            </li>
        </ul>
    </div>
    <div class="container-wrapper" id="hero">
        <div class="content">
            <div class="inner" style="width: 60%">
                <h1>
                    Learn <span class="blue-text">better.</span><br />Dream
                    <span class="blue-text">bigger.</span> <br />Travel
                    <span class="blue-text">further.</span>
                </h1>
                <p style="color: white; width: 80%">
                    Enhance your healthcare studies with global internships. Gain
                    hands-on experience, explore diverse medical environments, and make
                    a worldwide impact.
                </p>
                <div class="buttons">
                    <button class="transparent" id="applyNowButton">Apply Now</button>

                    <script>
                    document.getElementById('applyNowButton').addEventListener('click', function() {
                        window.location.href = "{{ url('/practice') }}";
                    });
                    </script>
                    <button>Learn More</button>
                </div>
            </div>
            <div class="inner" style="width: 40%">
                <img src="/assets/images/doctors.webp" alt="" />
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1718970809">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="counter-wrapper">
        <div class="counter-content">
            <div class="counter-div">
                <h2 class="counter" data-count="14">0</h2>
                <h3>Global Locations</h3>
            </div>
            <div class="counter-div">
                <h2 class="counter" data-count="18">0</h2>
                <h3>Industries</h3>
            </div>
            <div class="counter-div">
                <h2 class="counter" data-count="5000">0</h2>
                <h3>Host Companies</h3>
            </div>
        </div>
    </div>
    <div class="container-wrapper">
        <div class="top-content">
            <div class="top-aligned" style="width: 60%">
                <h1 class="text">What is My Healthcare Academy?</h1>
            </div>

            <div class="top-aligned" style="width: 40%">
                <p>
                    My Academy Center provides immersive global experiences that help
                    shape the personal and professional growth of ambitious individuals.
                    Our program participants get the chance to travel, work, and be part
                    of vibrant cultures and communities across the world.
                </p>

                <div class="rating">
                    <div>
                        <span class="blue">4.9/5 </span><span class="yellow">★★★</span>
                        <br /><span> GoOverseas</span>
                    </div>
                    <div>
                        <span class="blue">4.6/5</span><span class="yellow"> ★★★★</span><br /><span> GoAbroad</span>
                    </div>
                    <div>
                        <span class="blue">4.6/5 </span><span class="yellow">★★★★</span><br /><span> Trustpilot</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel">
        <div class="carousel-slide">
            <div class="carousel-left">
                <div class="carousel-heading">Step forward, stand out</div>
            </div>
            <div class="carousel-right">
                <div class="dot-container">
                    <span class="carousel-dot" onclick="currentSlide(0)"></span>
                    <span class="carousel-dot" onclick="currentSlide(1)"></span>
                    <span class="carousel-dot" onclick="currentSlide(2)"></span>
                </div>
                <div class="carousel-subheading">build your confidence</div>
                <div class="carousel-description">Our program empowers you with the skills and experience that employers
                    value. Knowing you have what it takes to succeed, you will start your career journey with
                    confidence. </div>
            </div>
        </div>
    </div>
    <div class="container-wrapper">
        <div class="content-col">
            <h1>How It Works?</h1>
            <div class="row">
                <div class="card">
                    <div class="icon-bg">
                        <i class="fa-solid fa-location-dot icon"></i>
                    </div>
                    <h3>1. Design Your Program</h3>
                    <p>Our program can be taken in 14 of the world’s most exciting cities. Pick a city that suits your
                        career goals.</p>
                </div>
                <div class="card">
                    <div class="icon-bg">
                        <i class="fa-solid fa-pencil icon"></i>
                    </div>
                    <h3>2. Apply Online</h3>
                    <p>If you are eligible you will be invited to attend an admission interview to discuss your program
                        further.</p>
                </div>
                <div class="card">
                    <div class="icon-bg">
                        <i class="fa-solid fa-lightbulb icon"></i>
                    </div>
                    <h3>3. Get Excited!</h3>
                    <p>As soon as you are accepted we’ll begin preparing your program. Starting with understanding your
                        goals and matching your profile with one of our host company partners.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-wrapper-col"
        style="background-image:linear-gradient(
        rgba(255, 255, 255, 0.8),
        rgba(255, 255, 255, 0.8)),url(https://static.vecteezy.com/system/resources/previews/022/341/530/non_2x/city-street-map-background-icon-vector.jpg); background-size:cover; background-attachment:fixed;">
        <div class="top-content">
            <div class="top-aligned" style="width: 60%">
                <h1 class="text">Worldwide Locations </h1>
            </div>
            <div class="top-aligned" style="width: 40%">
                <p>
                    Our programs span 14 vibrant cities worldwide, each offering unique opportunities for growth and
                    cultural immersion. These carefully chosen locations enhance your educational journey. Join us to
                    broaden your horizons and explore new possibilities.
                </p>
            </div>
        </div>
        <div class="content slider">
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
            <div class="slider-card">
                <img src="{{ asset('assets/images/tokyo-tower.png') }}" alt="" class="card-image">
                <h3 class="card-text">Tokyo</h3>
            </div>
        </div>
        <footer class="footer">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
            </ul>
            <ul class="footer-menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>

            </ul>
            <p>&copy;2021 Nadine Coelho | All Rights Reserved</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="script.js"></script>
</body>

</html>