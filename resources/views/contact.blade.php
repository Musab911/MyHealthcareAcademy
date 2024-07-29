<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_US</title>
    <link href="{{ asset('assets/css/frontend.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
</head>

<body>
    <nav>
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" />
            </a>
        </div>
        <ul>

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
            >
            <li><a href="{{ route('apply.now') }}">Apply Now</a></li>
            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
            <li><a href="{{ route('about.us') }}">About Us</a></li>
            <li><a href="{{ route('location') }}">Locations</a></li>
        </ul>
    </div>
    <div class="container-wrapper" id="hero">
        <div class="content">
            <div class="inner" style="width: 60%">
                <h1>
                    Let's <span class="blue-text">Get in touch</span><br />
                    with our team
                </h1>

                <p style="color: white; width: 80%">
                    Our team at My Healthcare Academy is here to support you. Whether you have questions or need
                    guidance, we're just a message away. Reach out and let's achieve your healthcare career goals
                    together.
                </p>

                <div class="buttons">
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const = document.getElementById('');
                        if () {
                            .addEventListener('click', function() {
                                window.location.href = "{{ url('/applynow') }}";
                            });
                        }
                    });
                    </script>
                </div>
            </div>
            <div class="inner" style="width: 40%">
                <img src="/assets/images/agent1.jpg" alt="" />
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

    <div class="container_foam ">
        <div class="box">
            <div class="info-section">
                <img src="\assets\images\contactus.jpg" alt="">

                <div class="info-item">
                    <div class="iconbg">
                        <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
                    </div>
                    <p><a href="mailto:info@myhealthcaresupport.co.uk">info@myhealthcaresupport.co.uk</a></p>
                </div>
                <div class="info-item">
                    <div class="iconbg">
                        <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                    </div>
                    <p><a href="mailto:info@myhealthcaresupport.co.uk">info@myhealthcaresupport.co.uk</a></p>
                </div>
                <div class="info-item">
                    <div class="iconbg">
                        <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                    </div>
                    <p><a href="mailto:info@myhealthcaresupport.co.uk">info@myhealthcaresupport.co.uk</a></p>
                </div>
            </div>
            <div class="form-section">
                <h1>Get in Touch</h1>
                <h3>Let's Chat, Reach Out to Us</h3>
                <p class="jbt">Have questions or feedback? We're here to help. Send us a message, and we'll respond
                    within 24 hours.</p>
                <form  action = "{{ route('cities.store') }}"  method="post" >
                    @csrf
                    <div class="inline-fields">
                        <input type="text" name="first-name" placeholder="First name" required>
                        <input type="text" name="last-name" placeholder="Last name" required>
                    </div>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" placeholder="Leave us a message" rows="4" required></textarea>
                    <div class="privacy-policy">
                        <input type="checkbox" name="privacy-policy" id="privacy-policy" required>
                        <label for="privacy-policy">I agree to the <a href="#">Privacy Policy</a></label>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
        <script src="{{ asset('script.js') }}"></script>
</body>

</html>