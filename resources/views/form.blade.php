<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
</head>

<body class="bg-theme bg-theme1">
<div class="container">
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
