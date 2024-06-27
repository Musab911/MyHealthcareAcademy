<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Details</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .tag {
            display: inline-block;
            background-color: #f0f0f0;
            color: #333;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .tag.selected {
            background-color: #007bff;
            color: #fff;
        }
        .tag.disabled {
            opacity: 0.5;
        }
        .switch-industry {
            margin-top: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: red;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="tel"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .flag {
            width: 20px;
            height: 15px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container">
        <h2 class="title">{{ $internship->name }}</h2>
        <p><strong>Start Date:</strong> {{ $internship->start_date->format('F j, Y') }}</p>
        <p><strong>Duration:</strong> {{ $internship->duration }} weeks</p>
        <p><strong>City:</strong> {{ $internship->city }}</p>
        <p><strong>Industry:</strong> {{ $internship->industry }}</p>
        <p><strong>Positions Available:</strong> {{ $internship->positions }}</p>
        <p><strong>Price:</strong> £{{ $internship->price }}</p>
        
        <hr>
        
        <h3>Select Fields (Select 2 to 5)</h3>
        <div class="form-group">
            <label for="fieldTags">Select Field:</label>
            <div id="fieldTags">
                <!-- Field tags will be appended here -->
            </div>
            <hr>
            
        </div>

        <div class="form-group">
            <label for="industrySelect">Select 2nd Industry:</label>
            <select id="industrySelect" class="form-control">
                <option value="">Select Industry</option> <!-- Default option -->
                <!-- Industry options will be appended here dynamically -->
            </select>
        </div>

        <h3>Select Fields</h3>
        <div class="form-group">
            <div id="newFieldTags">
                <!-- New field tags will be appended here -->
            </div>
        </div>

        <button id="submitFormButton">Next</button>
    </div>

    <!-- jQuery first, then Select2, then any other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script>
$(document).ready(function() {
    var selectedFields = [];
    var selectedNewFields = [];
    var currentIndustry = "{{ $internship->industry }}";
    var currentCity = "{{ $internship->city }}";

    fetchFields(currentCity, currentIndustry, '#fieldTags'); // Initial fetch based on current city and industry
    populateIndustryDropdown(currentCity, currentIndustry); // Populate industry dropdown initially

    // Function to fetch fields via AJAX
    function fetchFields(city, industry, targetDiv) {
        if (city && industry) {
            $.ajax({
                url: '{{ route("get.fields") }}',
                type: 'POST',
                data: {
                    city: city,
                    industry_name: industry,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log('Success:', data); // Check the response data
                    if (data && data.fields) {
                        var fields = data.fields;

                        if (fields.length > 0) {
                            // Clear existing tags in the target container
                            $(targetDiv).empty();

                            // Append new tags to the target container
                            $.each(fields, function(index, field) {
                                var tagId = 'tag-' + industry + '-' + index; // Create a unique ID for the tag
                                var tag = $('<span class="tag" id="' + tagId + '">' + field.field + '</span>');
                                $(targetDiv).append(tag);
                            });

                            // Handle click on tags to select/deselect
                            $(targetDiv).off('click', '.tag').on('click', '.tag', function() {
                                var field = $(this).text();

                                if ($(this).hasClass('selected')) {
                                    // Deselect the tag
                                    $(this).removeClass('selected');
                                    if (targetDiv === '#fieldTags') {
                                        selectedFields = selectedFields.filter(function(item) {
                                            return item !== field;
                                        });
                                    } else if (targetDiv === '#newFieldTags') {
                                        selectedNewFields = selectedNewFields.filter(function(item) {
                                            return item !== field;
                                        });
                                    }
                                } else {
                                    // Check if we can select more fields
                                    if (targetDiv === '#fieldTags' && selectedFields.length >= 5) {
                                        alert('You can select a maximum of 5 fields in the first set.');
                                        return;
                                    } else if (targetDiv === '#newFieldTags' && selectedNewFields.length >= 5) {
                                        alert('You can select a maximum of 5 fields in the second set.');
                                        return;
                                    }

                                    // Select the tag
                                    $(this).addClass('selected');
                                    if (targetDiv === '#fieldTags') {
                                        selectedFields.push(field);
                                    } else if (targetDiv === '#newFieldTags') {
                                        selectedNewFields.push(field);
                                    }
                                }

                                console.log('Selected Fields:', selectedFields);
                                console.log('Selected New Fields:', selectedNewFields);
                            });
                        } else {
                            // Display message when no fields are available
                            $(targetDiv).html('<p>No fields available for the selected criteria.</p>');
                        }
                    } else {
                        console.error('Unexpected data format:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching fields:', error); // Log AJAX error
                }
            });
        } else {
            console.error('City or Industry not available.'); // Log error if city or industry are not available
        }
    }

    // Function to populate industry dropdown
    function populateIndustryDropdown(city, currentIndustry) {
        $.ajax({
            url: '{{ route("get-industries") }}',
            type: 'POST',
            data: {
                city: city,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log('Industry Data:', data); // Check the response data
                if (Array.isArray(data) && data.length > 0) {
                    $('#industrySelect').empty(); // Clear existing options

                    // Add the "Select Industry" option at the top
                    $('#industrySelect').append('<option value="">Select Industry</option>');

                    // Append options to the dropdown
                    $.each(data, function(index, industry) {
                        if (industry.name !== currentIndustry) { // Filter out the current industry
                            var option = $('<option value="' + industry.name + '">' + industry.name + '</option>');
                            $('#industrySelect').append(option);
                        }
                    });

                    // Set default selected option
                    $('#industrySelect').val("");
                } else {
                    console.error('Unexpected data format:', data);
                }
            },
            error:
            function(xhr, status, error) {
                console.error('Error fetching industries:', error); // Log AJAX error
            }
        });
    }

    // Handle industry dropdown change
    $('#industrySelect').change(function() {
        var newIndustry = $(this).val();
        fetchFields(currentCity, newIndustry, '#newFieldTags'); // Fetch fields for the selected industry
        currentIndustry = newIndustry; // Update current industry
    });

    // Submit button click handler
    $('#submitFormButton').click(function(e) {
        e.preventDefault(); // Prevent form submission

        // Check if both sets of fields meet the criteria
        if (selectedFields.length < 2 || selectedFields.length > 5) {
            alert('Please select between 2 to 5 fields in the first set.');
            return;
        }
        if (selectedNewFields.length < 2 || selectedNewFields.length > 5) {
            alert('Please select between 2 to 5 fields in the second set.');
            return;
        }

        // Proceed to show the next form
        showNextForm();
    });

    // Function to show the next form
    function showNextForm() {
        $('.container').html(`
            
                <h1>So, tell us about yourself...</h1>

             <form action="{{ route('applications.store') }}" method="POST">
             @csrf
             <input type="hidden" name="internship_name" value="{{ $internship->name }}">
                <input type="hidden" name="first_industry" value="{{ $internship->industry }}">
                <input type="hidden" name="first_field1" value="${selectedFields[0] || ''}">
                <input type="hidden" name="first_field2" value="${selectedFields[1] || ''}">
                <input type="hidden" name="first_field3" value="${selectedFields[2] || ''}">
                <input type="hidden" name="first_field4" value="${selectedFields[3] || ''}">
                <input type="hidden" name="first_field5" value="${selectedFields[4] || ''}">
                <input type="hidden" name="second_industry" value="${$('#industrySelect').val()}">
                <input type="hidden" name="second_field1" value="${selectedNewFields[0] || ''}">
                <input type="hidden" name="second_field2" value="${selectedNewFields[1] || ''}">
                <input type="hidden" name="second_field3" value="${selectedNewFields[2] || ''}">
                <input type="hidden" name="second_field4" value="${selectedNewFields[3] || ''}">
                <input type="hidden" name="second_field5" value="${selectedNewFields[4] || ''}">
                <input type="hidden" name="city" value="{{ $internship->city }}">
                <input type="hidden" name="duration_weeks" value="{{ $internship->duration }}">
                <input type="hidden" name="start_date" value="{{ $internship->start_date->format('Y-m-d') }}">
                <input type="hidden" name="price" value="{{ $internship->price }}">

                    
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name">
                    </div>

                    <div class="form-group">
    <label for="dateOfBirth">Date of Birth</label>
    <input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth" class="form-control">
</div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <select id="nationality" name="nationality">
                            <!-- Options will be dynamically populated by JavaScript -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" id="emailAddress" name="emailAddress" placeholder="Email Address">
                    </div>

                    <div class="form-group">
                        <label for="nativeLanguage">Native Language</label>
                        <input type="text" id="nativeLanguage" name="nativeLanguage" placeholder="Native Language">
                    </div>

                    <div class="form-group">
                        <label for="englishLevel">English Level</label>
                        <select id="englishLevel" name="englishLevel">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="motivation">What motivates you to join our program?</label>
                        <select id="motivation" name="motivation">
                            <option value="" selected disabled>Choose an option</option>
                            <option value="To immerse in a new cultural experience combining travel and work with like minded people">To immerse in a new cultural experience combining travel and work with like minded people</option>
                            <option value="To enhance my career profile with a professional internship aligned with my goals and skill sets">To enhance my career profile with a professional internship aligned with my goals and skill sets</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Are you currently studying for a degree?</label>
                        <div>
                            <input type="radio" id="degree" name="degree" value="degree">
                            <label for="degree">I have graduated from a degree</label>
                        </div>
                        <div>
                            <input type="radio" id="full-time" name="degree" value="full-time">
                            <label for="full-time">I am currently enrolled to or are studying a full-time degree</label>
                        </div>
                        <div>
                            <input type="radio" id="none" name="degree" value="none">
                            <label for="none">None of the above</label>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            
        `);

        // Initialize intlTelInput on phone number field
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch('https://ipinfo.io/json', { cache: 'reload' }).then(function(response) {
                    return response.json();
                }).then(function(ipjson) {
                    callback(ipjson.country);
                }).catch(function() {
                    callback('us');
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // Populate the nationality dropdown
        var nationalityDropdown = document.getElementById('nationality');
        var countries = window.intlTelInputGlobals.getCountryData();

        for (var i = 0; i < countries.length; i++) {
            var country = countries[i];
            var option = document.createElement('option');
            option.value = country.iso2;
            option.text = country.name;
            nationalityDropdown.appendChild(option);
        }
    }
});
</script>

    
</body>
</html>
