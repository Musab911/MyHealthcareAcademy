@extends('layouts.app')

@push('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
@endpush

@section('content')
<div class="container">
    <div class="content-col">
        <h1>Start Dates & Apply</h1>
        <div class="row">
            <div class="form">
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
                            <input type="range" id="duration" name="duration" min="4" max="24" step="2" class="form-range">
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
            <div class="interndiv" >
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
        const options = { day: '2-digit', month: 'short' };
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
            success: function (data) {
                var results = $('#internshipResults');
                results.empty();
                if (data.length > 0) {
                    var resultHeader = $('<h3>').text(`Start dates in ${city} for ${industry}`);
                    results.append(resultHeader);

                    $.each(data, function (index, internship) {
                        var availability = getAvailability(internship.positions);
                        var totalCost = parseFloat(internship.price); // Ensure it's a number
                        if (accommodationPrice > 0) {
                            totalCost += parseFloat(accommodationPrice); // Add accommodation price
                        }
                        var applyLink = $('<button href="javascript:void(0);" onclick="applyNow(' + internship.id + ')">Apply Now</button>').addClass('apply-button');
                        var row = $('<div>').addClass('internship-row');

                        var dateColumn = $('<div>').addClass('date-column').html('<h4>' + formatDate(internship.start_date) + '</h4><p>2024</p>');
                        var priceColumn = $('<div>').addClass('price-column').text(totalCost.toFixed(2) + ' ' + selectedCurrency); // Display selected currency
                        var availabilityColumn = $('<div>').addClass('availability-column').text(availability);
                        var applyColumn = $('<div>').addClass('apply-column').append(applyLink);

                        row.append(dateColumn).append(priceColumn).append(availabilityColumn).append(applyColumn);
                        results.append(row);
                    });
                } else {
                    results.append('<p>No internships found for the selected criteria.</p>');
                }

                // Display #interndiv when internships are fetched
                displayInternDiv();
            },
            error: function (xhr, status, error) {
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
            success: function (data) {
                if (data.price) {
                    accommodationPrice = parseFloat(data.price); // Ensure it's a number
                    $('#additionalCostMessage').show().text('Additional Cost: £' + accommodationPrice.toFixed(2));
                } else {
                    $('#additionalCostMessage').show().text('Accommodation not available');
                }
                var duration = $('#duration').val();
                fetchInternships(selectedCity, selectedIndustry, duration);
            },
            error: function (xhr, status, error) {
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
            success: function (data) {
                exchangeRates = data.rates;
                populateCurrencyDropdown();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching exchange rates: ', xhr.responseText);
            }
        });
    }

    function populateCurrencyDropdown() {
        var currencyDropdown = $('#currency');
        currencyDropdown.empty();
        $.each(exchangeRates, function (currency, rate) {
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

    $(document).ready(function () {
        var loadedIndustryNames = new Set();

        // Fetch industries based on selected city
        $('#city').change(function () {
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
                    success: function (data) {
                        loadedIndustryNames.clear();
                        $.each(data, function (key, industry) {
                            if (!loadedIndustryNames.has(industry.name)) {
                                $('#industry').append('<option value="' +
                                    industry.name + '">' + industry.name +
                                    '</option>');
                                loadedIndustryNames.add(industry.name);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching industries: ', xhr.responseText);
                    }
                });
            }
            checkSelection();
        });

        // Show duration options when both city and industry are selected
        $('#industry').change(function () {
            checkSelection();
        });

        // Show internship results when duration range changes
        $('#duration').on('input', function () {
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
        $('#currency').change(function () {
            selectedCurrency = $(this).val();
            var totalCost = parseFloat($('.price-column').text().split(' ')[0]); // Extract number from displayed cost
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
@endsection
