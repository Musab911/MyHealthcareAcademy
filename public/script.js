document.addEventListener('DOMContentLoaded', function () {
  const counters = document.querySelectorAll('.counter');

  const options = {
    root: null, // Use the viewport as the root
    rootMargin: '0px',
    threshold: 0.5 // Trigger when 50% of the element is visible
  };

  const counterObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        startCounting(counter);
        counterObserver.unobserve(counter); // Stop observing once started counting
      }
    });
  }, options);

  counters.forEach(counter => {
    counterObserver.observe(counter);
  });

  function startCounting(counter) {
    const updateCount = () => {
      const target = +counter.getAttribute('data-count');
      const count = +counter.innerText;
      const increment = target / 200;

      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount, 10);
      } else {
        counter.innerText = target;
      }
    };

    updateCount();
  }
});


//carousel code
const carouselData = [
            {
                heading: "Step forward, stand out",
                subheading: "Build your confidence",
                description: "Our program empowers you with the skills and experience that employers value. Knowing you have what it takes to succeed, you will start your career journey with confidence.",
                image: "/assets/images/doctors.webp"
            },
            {
                heading: "Embrace new challenges",
                subheading: "Discover your potential",
                description: "Step out of your comfort zone and take on new challenges. Our program helps you discover your true potential and prepares you for a dynamic career.",
                image: "https://beyondacademy.com/wp-content/uploads/2019/12/home-slider-1-1920x0-c-default.webp"
            },
            {
                heading: "Achieve your goals",
                subheading: "Reach for success",
                description: "With our support and guidance, you can achieve your career goals. We provide the resources and opportunities to help you reach new heights of success.",
                image: "https://beyondacademy.com/wp-content/uploads/2019/12/home-slider-3-1920x0-c-default.webp"
            }
        ];

        const carouselContainer = document.querySelector('.carousel');
        const headingElement = document.querySelector('.carousel-heading');
        const subheadingElement = document.querySelector('.carousel-subheading');
        const descriptionElement = document.querySelector('.carousel-description');
        const dots = document.querySelectorAll('.carousel-dot');

        let currentSlideIndex = 0;

        function updateSlide(index) {
            const fadeInClass = 'fade-in';
            const fadeOutClass = 'fade-out';

            // Add fade-out animation to text elements
            headingElement.classList.add(fadeOutClass);
            subheadingElement.classList.add(fadeOutClass);
            descriptionElement.classList.add(fadeOutClass);

            setTimeout(() => {
                // Update text content after fade-out animation
                const slideData = carouselData[index];
                headingElement.textContent = slideData.heading;
                subheadingElement.textContent = slideData.subheading;
                descriptionElement.textContent = slideData.description;

                // Remove fade-out and add fade-in animation
                headingElement.classList.remove(fadeOutClass);
                subheadingElement.classList.remove(fadeOutClass);
                descriptionElement.classList.remove(fadeOutClass);

                headingElement.classList.add(fadeInClass);
                subheadingElement.classList.add(fadeInClass);
                descriptionElement.classList.add(fadeInClass);

                // Remove fade-in class after animation completes
                setTimeout(() => {
                    headingElement.classList.remove(fadeInClass);
                    subheadingElement.classList.remove(fadeInClass);
                    descriptionElement.classList.remove(fadeInClass);
                }, 1000);
            }, 1000);

            // Update background image immediately
            carouselContainer.style.backgroundImage = `linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url(${carouselData[index].image})`;

            currentSlideIndex = index;
            dots.forEach((dot, i) => {
                dot.style.backgroundColor = i === currentSlideIndex ? 'white' : 'transparent';
            });
        }

        function currentSlide(index) {
            updateSlide(index);
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide(index);
            });
        });
        function redirectToPractice() {
          window.location.href = '/practice';
      }
        function nextSlide() {
            const nextIndex = (currentSlideIndex + 1) % carouselData.length;
            updateSlide(nextIndex);
        }

        updateSlide(currentSlideIndex);
        setInterval(nextSlide, 10000); // Change slide every 5 seconds


        // nsvbar js start
        const mobileNav = document.querySelector(".hamburger");
const navbar = document.querySelector(".menubar");

const toggleNav = () => {
  navbar.classList.toggle("active");
  mobileNav.classList.toggle("hamburger-active");
};
mobileNav.addEventListener("click", () => toggleNav());
// nsvbar js end
//navbar animation start
document.addEventListener("DOMContentLoaded", function () {
    let header = document.querySelector('nav');
    let hero = document.getElementById('hero');

    let observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                header.classList.add('hero-visible');
            } else {
                header.classList.remove('hero-visible');
            }
        });
    }, {
        threshold: 0.1 // Adjust this value according to when you want the header to change
    });

    observer.observe(hero);
});

//navbar animation end