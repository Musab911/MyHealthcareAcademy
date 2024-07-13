<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apply Now</title>
    <link href="{{ asset('assets/css/frontend.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/form.css') }}" rel="stylesheet" />
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
                
                    <span class="blue-text">Kickstart </span>Your Healthcare <span class="blue-text">Career </span> Today
                </h1>
                <p style="color: white; width: 80%">
                Kickstart Your Healthcare Career Today: Apply for our internship program to gain practical experience, mentorship, and contribute to meaningful healthcare projects.
                </p>
                <div class="buttons">
                <button class="transparent" id="applyNowButton">Apply Now</button>
                <script>
document.addEventListener('DOMContentLoaded', function() {
    const applyNowButton = document.getElementById('applyNowButton');
    if (applyNowButton) {
        applyNowButton.addEventListener('click', function() {
            window.location.href = '#form';
        });
    }
});
</script>


                   
                    
                </div>
            </div>
            <div class="inner" style="width: 40%; position:relative;">
                <img src="/assets/images/applynow.png" alt="" />
                
            </div>
        </div>
        <div class=" custom-shape-divider-bottom-1718970809">
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
    <div class="container">
        <div class="content-col">
            <h1>Start Dates & Apply</h1>
            <div class="row">
                <div class="form"  id="form">
                    <form id="mainForm">
                        <div class="innerform">
                            <h2>Step 1</h2>
                            <h3>CHOOSE YOUR INDUSTRY: </h3>
                            <div class="control">
                                <select id="city" name="city" class="form-control">
                                    <option value="">Location</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->city }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                                <select id="industry" name="industry" class="form-control">
                                    <option value="">Industry</option>
                                </select>
                            </div>
                        </div>
                        <div class="innerform" id="secondInnerform" style="display: none;">
                            <div id="program" style="display: none;">
                                <h2>Step 2</h2>
                                <h3>LENGTH OF PROGRAM:</h3>
                                <span class="min-label">4</span>
                                <input type="range" id="duration" name="duration" min="4" max="24" step="2"
                                    class="form-range">
                                <span class="max-label">24</span>
                                <div class="range-labels">
                                    <span id="selectedWeeks">4 weeks</span>
                                </div>
                            </div>
                            <div class="toggle-button-container">
                                <label>Include Accommodation</label>
                                <div class="toggle-button" id="toggleButton" onclick="toggleAccommodation()">
                                    <div class="yes">Yes</div>
                                    <div class="no">No</div>
                                </div>
                                <div class="additional-cost" id="additionalCostMessage" style="display:none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="interndiv">
                    <div class="currency-container" id="currencyContainer" style="display:none;">
                        <label for="currency">Change Currency:</label>
                        <select id="currency" name="currency" class="form-control">
                            <!-- Options will be populated dynamically through JavaScript -->
                        </select>
                    </div>
                    <div id="internshipResults">
                        <!-- Internship results will be appended here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Select2, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Additional JavaScript -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/app-script.js') }}"></script>
    <script>
    var accommodationPrice = 0;
    var exchangeRates = {}; // Object to store exchange rates
    var baseCurrency = 'GBP'; // Base currency is Pound
    var selectedCurrency = 'GBP'; // Initially selected currency is Pound

    function applyNow(internshipId) {
        window.location.href = '/intern/' + internshipId; // Include internshipId in the route
    }

    function getAvailability(positions) {
        if (positions > 25) {
            return 'Good Availability';
        } else if (positions > 10) {
            return 'Moderate Availability';
        } else {
            return 'Low Availability';
        }
    }

    function formatDate(dateString) {
        const options = {
            day: '2-digit',
            month: 'short'
        };
        const date = new Date(dateString);
        return date.toLocaleDateString(undefined, options).toUpperCase();
    }

    function fetchInternships(city, industry, duration) {
        var formData = {
            city: city,
            industry: industry,
            duration: duration,
            accommodation: $('#toggleButton').hasClass('active'),
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: '/get-internships',
            type: 'POST',
            data: formData,
            success: function(data) {
                var results = $('#internshipResults');
                results.empty();
                if (data.length > 0) {
                    var resultHeader = $('<h3>').text(`Start dates in ${city} for ${industry}`);
                    results.append(resultHeader);

                    $.each(data, function(index, internship) {
                        var availability = getAvailability(internship.positions);
                        var totalCost = parseFloat(internship.price); // Ensure it's a number
                        if (accommodationPrice > 0) {
                            totalCost += parseFloat(accommodationPrice); // Add accommodation price
                        }
                        var applyLink = $('<button href="javascript:void(0);" onclick="applyNow(' +
                            internship.id + ')">Apply Now</button>').addClass('apply-button');
                        var row = $('<div>').addClass('internship-row');

                        var dateColumn = $('<div>').addClass('date-column').html('<h4>' +
                            formatDate(internship.start_date) + '</h4><p>2024</p>');
                        var priceColumn = $('<div>').addClass('price-column').text(totalCost
                            .toFixed(2) + ' ' + selectedCurrency); // Display selected currency
                        var availabilityColumn = $('<div>').addClass('availability-column').text(
                            availability);
                        var applyColumn = $('<div>').addClass('apply-column').append(applyLink);

                        row.append(dateColumn).append(priceColumn).append(availabilityColumn)
                            .append(applyColumn);
                        results.append(row);
                    });
                } else {
                    results.append('<p>No internships found for the selected criteria.</p>');
                }

                // Display #interndiv when internships are fetched
                displayInternDiv();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching internships: ', xhr.responseText);
            }
        });
    }

    function fetchAccommodationPrice(selectedCity, selectedIndustry) {
        $.ajax({
            url: '/get-accommodation-price',
            type: 'POST',
            data: {
                city: selectedCity,
                industry: selectedIndustry,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.price) {
                    accommodationPrice = parseFloat(data.price); // Ensure it's a number
                    $('#additionalCostMessage').show().text('Additional Cost: £' + accommodationPrice
                        .toFixed(2));
                } else {
                    $('#additionalCostMessage').show().text('Accommodation not available');
                }
                var duration = $('#duration').val();
                fetchInternships(selectedCity, selectedIndustry, duration);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching accommodation price: ', xhr.responseText);
            }
        });
    }

    function toggleAccommodation() {
        const toggleButton = document.getElementById('toggleButton');
        toggleButton.classList.toggle('active');
        const selectedCity = $('#city').val();
        const selectedIndustry = $('#industry').val();

        if (toggleButton.classList.contains('active')) {
            fetchAccommodationPrice(selectedCity, selectedIndustry);
            toggleButton.querySelector('.yes').style.backgroundColor = '#007bff';
            toggleButton.querySelector('.yes').style.color = '#fff';
            toggleButton.querySelector('.no').style.backgroundColor = '#f0f0f0';
            toggleButton.querySelector('.no').style.color = '#333';
        } else {
            $('#additionalCostMessage').hide();
            accommodationPrice = 0;
            toggleButton.querySelector('.yes').style.backgroundColor = '#f0f0f0';
            toggleButton.querySelector('.yes').style.color = '#333';
            toggleButton.querySelector('.no').style.backgroundColor = '#007bff';
            toggleButton.querySelector('.no').style.color = '#fff';
            var duration = $('#duration').val();
            fetchInternships(selectedCity, selectedIndustry, duration);
        }
    }

    function fetchExchangeRates() {
        $.ajax({
            url: 'https://api.exchangerate-api.com/v4/latest/' + baseCurrency,
            type: 'GET',
            success: function(data) {
                exchangeRates = data.rates;
                populateCurrencyDropdown();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching exchange rates: ', xhr.responseText);
            }
        });
    }

    function populateCurrencyDropdown() {
        var currencyDropdown = $('#currency');
        currencyDropdown.empty();
        $.each(exchangeRates, function(currency, rate) {
            currencyDropdown.append($('<option>', {
                value: currency,
                text: currency
            }));
        });
        currencyDropdown.val(selectedCurrency); // Set initial selected currency
    }

    function convertCurrency(totalCost) {
        var rate = exchangeRates[selectedCurrency];
        return (totalCost * rate).toFixed(2);
    }

    function displayInternDiv() {
        const interndiv = document.querySelector('.interndiv');
        if (interndiv) {
            interndiv.id = 'interndiv';
        }
    }

    $(document).ready(function() {
        var loadedIndustryNames = new Set();

        // Fetch industries based on selected city
        $('#city').change(function() {
            var selectedCity = $(this).val();
            $('#industry').empty().append('<option value="">Industry</option>');
            if (selectedCity) {
                $.ajax({
                    url: '/get-industries',
                    type: 'POST',
                    data: {
                        city: selectedCity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        loadedIndustryNames.clear();
                        $.each(data, function(key, industry) {
                            if (!loadedIndustryNames.has(industry.name)) {
                                $('#industry').append('<option value="' +
                                    industry.name + '">' + industry.name +
                                    '</option>');
                                loadedIndustryNames.add(industry.name);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching industries: ', xhr.responseText);
                    }
                });
            }
            checkSelection();
        });

        // Show duration options when both city and industry are selected
        $('#industry').change(function() {
            checkSelection();
        });

        // Show internship results when duration range changes
        $('#duration').on('input', function() {
            var duration = $(this).val();
            $('#selectedWeeks').text(duration + ' weeks');

            var city = $('#city').val();
            var industry = $('#industry').val();

            if (city && industry) {
                $('#currencyContainer').show(); // Show currency selector
                fetchInternships(city, industry, duration);
            }
        });

        // Handle currency change
        $('#currency').change(function() {
            selectedCurrency = $(this).val();
            var totalCost = parseFloat($('.price-column').text().split(' ')[
                0]); // Extract number from displayed cost
            var convertedCost = convertCurrency(totalCost);
            $('.price-column').text(convertedCost + ' ' + selectedCurrency);
        });

        function checkSelection() {
            var city = $('#city').val();
            var industry = $('#industry').val();
            if (city && industry) {
                $('#program').show();
                $('#secondInnerform').show().addClass('visible');
            } else {
                $('#program').hide();
                $('#secondInnerform').hide().removeClass('visible');
            }
        }

        // Fetch exchange rates on page load
        fetchExchangeRates();
    });
    </script>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>