<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Include Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <title>My Health care</title>
</head>
<body>
  <div class="container">
    <h2 class="title">Start Dates & Apply</h2>
    <div class="step">
      <div class="step-number"></div>
      <div class="step-text">Step 1</div>
    </div>
    <form id="mainForm">
      <label for=""><h1>Select Details</h1></label>
      <div class="form-group">
        <label for="city">Select City:</label>
        <select id="city" name="city" class="form-control">
          <option value="">--Select City--</option>
          @foreach($cities as $city)
            <option value="{{ $city->city }}">{{ $city->city }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="industry">Select Industry:</label>
        <select id="industry" name="industry" class="form-control">
          <option value="">--Select Industry--</option>
        </select>
      </div>
      <div class="form-group">
        <label for="duration">Select Length of Program:</label>
        <input type="range" id="duration" name="duration" min="4" max="24" step="2" class="form-range">
        <span id="selectedWeeks">4</span> weeks
      </div>
      <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
    </form>
    <div id="internshipResults"></div>
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
    $(document).ready(function() {
      var loadedIndustryNames = new Set();

      // Fetch industries based on selected city
      $('#city').change(function() {
        var city = $(this).val();
        $('#industry').empty().append('<option value="">--Select Industry--</option>');
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

      // Update selected weeks when the range input changes
      $('#duration').on('input', function() {
        $('#selectedWeeks').text($(this).val());
      });
    });

    function formatDate(dateString) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      const date = new Date(dateString);
      return date.toLocaleDateString(undefined, options);
    }

    function submitForm() {
      var formData = {
        city: $('#city').val(),
        industry: $('#industry').val(),
        duration: $('#duration').val(),
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
            var table = $('<table class="table"><thead><tr><th>Start Date</th><th>Price</th><th>Availability</th><th>Apply</th></tr></thead><tbody></tbody></table>');
            $.each(data, function(index, internship) {
              var availability = getAvailability(internship.positions);
              var applyLink = $('<a href="#" onclick="applyNow(' + internship.id + ')">Apply Now</a>'); // Pass internship.id to applyNow
              table.append('<tr><td><h3>' + formatDate(internship.start_date) + '</h3></td><td>' + internship.price + ' £</td><td>' + availability + '</td><td></td></tr>').find('td:last').append(applyLink);
            });
            results.append(table);
          } else {
            results.append('<p>No internships found for the selected criteria.</p>');
          }
        },
        error: function(xhr, status, error) {
          console.error('Error fetching internships: ', xhr.responseText);
        }
      });
    }

    function getAvailability(positions) {
      if (positions > 25) {
        return 'Good availability';
      } else if (positions > 10) {
        return 'Moderate availability';
      } else {
        return 'Low availability';
      }
    }

    function applyNow(internshipId) {
      window.location.href = '/intern/' + internshipId; // Include internshipId in the route
    }
  </script>
</body>
</html>
