<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beyond Academy</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      width: 50px;
      height: auto;
      margin-right: 10px;
    }
    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      list-style: none;
      padding: 0;
    }
    .nav li {
      margin-right: 20px;
    }
    .nav a {
      text-decoration: none;
      color: #333;
    }
    .title {
      font-size: 32px;
      font-weight: bold;
      color: #f00;
      margin-bottom: 20px;
    }
    .step {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .step-number {
      width: 50px;
      height: 100%;
      background-color: #f00;
      margin-right: 20px;
    }
    .step-text {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    .form-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .form-group label {
      font-size: 16px;
      font-weight: bold;
      color: #333;
    }
    .form-group select {
      width: 48%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    .button {
      background-color: #f00;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <img src="logo.png" alt="Beyond Academy Logo">
        <h1>Beyond Academy</h1>
      </div>
      <ul class="nav">
        <li><a href="#">View Our Testimonials</a></li>
        <li><button class="button">Apply Now</button></li>
        <li><i class="fa fa-bars"></i></li>
      </ul>
    </div>
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
        <label for="programLength">Select Length of Program:</label>
        <input type="range" id="programLength" name="programLength" min="4" max="24" step="2" class="form-range">
        <span id="selectedWeeks">4</span> weeks
      </div>
      <button id="nextButton" type="button" class="btn btn-primary">Next</button>
    </form>
    <div id="fieldsContainer" class="form-group mt-4" style="display:none;">
      <!-- Fields will be populated here -->
    </div>
  </div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Additional JavaScript -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/app-script.js"></script>
  <script>
    $(document).ready(function() {
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
              $.each(data, function(key, industry) {
                $('#industry').append('<option value="' + industry.id + '">' + industry.name + '</option>');
              });
            }
          });
        }
      });
      $('#nextButton').click(function() {
        var city = $('#city').val();
        var industry = $('#industry').val();
        var programLength = $('#programLength').val();
        if (city && industry) {
          loadFields(city, industry);
        } else {
          alert('Please select both city and industry.');
        }
      });
      $('#programLength').on('input', function() {
        $('#selectedWeeks').text($(this).val());
      });
      function loadFields(city, industry) {
        $.ajax({
          url: '/get-fields',
          type: 'POST',
          data: {
            city: city,
            industry: industry,
            _token: '{{ csrf_token() }}'
          },
          success: function(data) {
            console.log(data); // Debugging: Check the returned data
            $('#fieldsContainer').empty().show();
            $.each(data, function(key, field) {
              $('#fieldsContainer').append('<span class="badge badge-primary m-1">' + field + '</span> ');
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText); // Debugging: Check for errors
          }
        });
      }
    });
  </script>
</body>
</html>
