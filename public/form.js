function applyNow(internshipId) {
    window.location.href = '/intern/' + internshipId; // Include internshipId in the route
}

$(document).ready(function() {
    var loadedIndustryNames = new Set();

    // Fetch industries based on selected city
    $('#city').change(function() {
        var city = $(this).val();
        $('#industry').empty().append('<option value="">Industry</option>');
        if (city) {
            $.ajax({
                url: '/get-industries',
                type: 'POST',
                data: {
                    city: city,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    loadedIndustryNames.clear();
                    $.each(data, function(key, industry) {
                        if (!loadedIndustryNames.has(industry.name)) {
                            $('#industry').append('<option value="' + industry.name + '">' + industry.name + '</option>');
                            loadedIndustryNames.add(industry.name);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching industries: ', xhr.responseText);
                }
            });
        }
    });

    // Show duration options when both city and industry are selected
    $('#industry').change(function() {
        var industry = $(this).val();
        if (industry) {
            $('#program').show();
        } else {
            $('#program').hide();
        }
    });

    // Show internship results when duration range changes
    $('#duration').on('input', function() {
        var duration = $(this).val();
        $('#selectedWeeks').text(duration + ' weeks');

        var city = $('#city').val();
        var industry = $('#industry').val();

        if (city && industry) {
            fetchInternships(city, industry, duration);
        }
    });

    function fetchInternships(city, industry, duration) {
        var formData = {
            city: city,
            industry: industry,
            duration: duration,
            _token: '{{ csrf_token() }}'
        };

        console.log("Form Data:", formData);

        $.ajax({
            url: '/get-internships',
            type: 'POST',
            data: formData,
            success: function(data) {
                var results = $('#internshipResults');
                results.empty();
                if (data.length > 0) {
                    $.each(data, function(index, internship) {
                        var availability = getAvailability(internship.positions);
                        var applyLink = $('<a href="javascript:void(0);" onclick="applyNow(' + internship.id + ')">Apply Now</a>').addClass('apply-button');
                        var row = $('<div>').addClass('internship-row');

                        var dateColumn = $('<div>').addClass('date-column').html('<h3>' + formatDate(internship.start_date) + '</h3><p>2024</p>');
                        var priceColumn = $('<div>').addClass('price-column').text(internship.price + ' £');
                        var availabilityColumn = $('<div>').addClass('availability-column').text(availability);
                        var applyColumn = $('<div>').addClass('apply-column').append(applyLink);

                        row.append(dateColumn).append(priceColumn).append(availabilityColumn).append(applyColumn);
                        results.append(row);
                    });
                } else {
                    results.append('<p>No internships found for the selected criteria.</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching internships: ', xhr.responseText);
            }
        });
    }

    // Function to format date
    function formatDate(dateString) {
        const options = {
            day: '2-digit',
            month: 'short'
        };
        const date = new Date(dateString);
        return date.toLocaleDateString(undefined, options).toUpperCase();
    }

    // Function to get availability
    function getAvailability(positions) {
        if (positions > 25) {
            return 'Good Availability';
        } else if (positions > 10) {
            return 'Moderate Availability';
        } else {
            return 'Low Availability';
        }
    }
});
