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
            <img src="assets/images/logo.png" alt="logo" />
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
                    Learn More About <br>
                    <span class="blue-text">My Healthcare Acadmey</span>
                </h1>
                <p style="color: white; width: 80%">
                    Going Healthcare means becoming a better you, with every step you take.
                </p>

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

    <div class="counter-wrapper">
        <div class="counter-content">
            <div class="counter-div">
                <h2 class="counter" data-count="50">0</h2>
                <h3>Employees</h3>
            </div>
            <div class="counter-div">
                <h2 class="counter" data-count="300">0</h2>
                <h3>Online Reviews</h3>
            </div>
            <div class="counter-div">
                <h2 class="counter" data-count="5">0</h2>
                <h3>Award-winning</h3>
            </div>
        </div>
    </div>


    <div class="container-wrapper-col">
        <div class="content">
            <h1>Why Join My Healthcare Academy?</h1>
        </div>
        <div class="top-content">
            <div class="top-aligned">
                <p>
                    Our programs span 14 vibrant cities worldwide, each offering unique opportunities for growth and
                    cultural
                    immersion. These carefully chosen locations enhance your educational journey. Join us to broaden
                    your horizons
                    and explore new possibilities.
                </p>
                <ul>
                    <li>9.3/10&#9733; rating on GoAbroad.com. Award-winning provider.</li>
                    <li>4.8/5&#9733; rating on GoOverseas.com. Gold-verified partner.</li>
                    <li>4.7/5&#9733; rating on TrustPilot. Verified partner.</li>
                    <li>300+ verified reviews online.</li>
                    <li>5,000+ host company partners.</li>
                    <li>10,000+ qualified applications received yearly.</li>
                    <li>50+ nationalities of interns hosted so far.</li>
                </ul>
            </div>

            <div class="top-aligned">
                <img src="https://beyondacademy.com/wp-content/uploads/2023/09/Group-Primrose-hill-2.webp" alt="">
            </div>
        </div>

    </div>


    <div class="container-wrapper-col">
        <div class="content">
            <h1> Who is My Healthcare Academy?</h1>
        </div>
        <div class="top-content">
            <div class="top-aligned">

                <h2> How did it all start?</h>
                    <p>


                        Beyond Academy was founded in 2019 by Ryan Walker, a former management consultant and serial
                        entrepreneur
                        who managed to turn things around for himself after dropping out of school at 16. Driven by a
                        strong
                        motivation to turn things around for himself, Ryan stayed persistent and pursued every
                        opportunity he could
                        to get ahead, eventually beating the odds and going on to have a thriving corporate career. This
                        inspired
                        Ryan to create Beyond Academy, empowering those just starting out on their professional journey
                        to embark on
                        a life-changing opportunity that would change the course of their future and allow them to get
                        ahead in
                        their careers.</p>
                    <h2>Where can you find us?</h2>

                    <p>We’re a fully remote company – no traditional offices here! We mostly work from home (sometimes
                        in our PJs
                        when we can help it), but you’ll also find us hanging out in co-working spaces or soaking up
                        inspiration in
                        trendy cafés. Don’t let the casual vibe fool you though; every single one of us works hard to
                        deliver on
                        what we promise to you and make our fantastic programs a reality.</p>
                    <h2>Who are the people behind Beyond?<h2>

                            <p>We are a truly global team with over 50 people from 17 nationalities located across 14
                                countries! We
                                come from various backgrounds and walks of life, yet share one thing in common – we live
                                (or have lived)
                                abroad, and embrace the transformative impact of travel, cultural immersion, diverse
                                interactions, and
                                unique experiences. It is this shared passion that unites us in our commitment to
                                crafting programs that
                                create life-changing opportunities.</p>

                            <h2>Learn More and Meet Our Team</h2>
            </div>

            <div class="top-aligned">
                <img src="https://beyondacademy.com/wp-content/uploads/2024/02/The-Beyond-Academy-Global-Team-.webp"
                    alt="">
            </div>
        </div>

    </div>


    <div class="container-wrapper-col">
        <div class="content">
            <h1>Why We created My Healthcare Academy?</h1>
        </div>
        <div class="top-content">
            <div class="top-aligned">

                <h2> We created Healthcare acadmey to help you carve your own path. </h2>
                <p>

                    An average person spends 90,000 hours working over a lifetime. With 1/3 of our life at work, you
                    deserve a
                    career you love. The journey to a great career is unique to everyone. Whether you’re at the starting
                    line or a
                    crossroad, you should be able to take charge.</p>
                <p>
                    That’s why we created Beyond. Beyond offers career-boosting immersive programs. We bring global work
                    experience and industry-focused learning to young people. Designed to empower and enrich, our
                    programs give
                    you the tools and confidence to carve your own paths.</p>

            </div>

            <div class="top-aligned">
                <img src="https://beyondacademy.com/wp-content/uploads/2024/02/image-15.webp" alt="">
            </div>
        </div>

    </div>



    <div class="container-wrapper-col">
        <div class="content">
            <h1>Why We created My Healthcare Academy?</h1>
        </div>
        <div class="top-content">
            <div class="top-aligned">
                <img src="https://beyondacademy.com/wp-content/uploads/2021/01/DSC01241-1.webp" alt="">
            </div>


            <div class="top-aligned" style="width 40">

                <h2> We believe the future of education should be inclusive and diverse. </h2>
                <p>

                    We recognize the transformative power of education, and created Beyond Academy to be both a
                    complement and
                    alternative to traditional options. We value experience over exams, and growth over grades. We
                    embrace
                    individuality and aim to revolutionize education through the experience and community we create.
                    Whether
                    you’re an aspiring engineer or entrepreneur, an artist or a coder – you can always go Beyond to
                    learn better,
                    travel further, and dream bigger.</p>

            </div>
        </div>

    </div>


    <div class="container-wrapper-col">
        <div class="top-content">
            <div class="top-aligned">
                <h1> We Partner With 5,000+ Companies </h1>
                <p>
                    We work with over 5,000 partnering companies around the world – that’s a huge number. We collaborate
                    with
                    a diverse array of companies, spanning from boutique PR firms to multinational advisory firms.
                    Please note
                    that these examples are purely for reference. The specific company you’ll be associated with will be
                    determined by a wide range of criteria.</p>

            </div>

            <div class="logos">
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/saxo-e1693804600906-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/pembroke-e1693804520301-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/shuttle-e1693804557372-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/kmpg-e1693804484746-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/johnson-e1693804462348-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/tollgate-e1693804583446-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/rostrum-e1693804537145-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/mazars-e1693804503672-300x0-c-default.webp">
                </div>
                <div class="logo">
                    <img
                        src="https://beyondacademy.com/wp-content/uploads/2020/01/dansk-e1693804434351-300x0-c-default.webp">
                </div>
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
                        career
                        goals.</p>
                </div>
                <div class="card">
                    <div class="icon-bg">
                        <i class="fa-solid fa-pencil icon"></i>
                    </div>
                    <h3>2. Apply Online</h3>
                    <p>If you are eligible you will be invited to attend an admission interview to discuss your program
                        further.
                    </p>
                </div>
                <div class="card">
                    <div class="icon-bg">
                        <i class="fa-solid fa-lightbulb icon"></i>
                    </div>
                    <h3>3. Get Excited!</h3>
                    <p>As soon as you are accepted we’ll begin preparing your program. Starting with understanding your
                        goals and
                        matching your profile with one of our host company partners.</p>
                </div>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>