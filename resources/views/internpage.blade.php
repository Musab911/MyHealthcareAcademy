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
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/css/mycss.css') }}" rel="stylesheet"/>
</head>
<body class="bg-theme bg-theme1">
  @extends('layouts.sidebar')
  @section('content')
  <!-- Your index page content goes here -->
  @endsection
  <div class="content">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-lg-6 mx-auto"> <!-- Centering content -->
          <div class="custom-content">
            <div class="custom-card-body">
              <h2>Internship Application Form</h2>
              @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
              <form action="{{ route('internships.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="custom-label">Name:</label>
                  <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="start_date" class="custom-label">Start Date:</label>
                  <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="duration_weeks" class="custom-label">Duration (weeks):</label>
                  <input type="range" id="duration_weeks" name="duration_weeks" class="custom-range" min="4" max="24" step="4" value="4" required>
                  <span id="selectedWeeks">4</span> weeks
                  <!-- Hidden input field to store selected duration value -->
                  <input type="hidden" id="duration_value" name="duration_weeks" value="4">
                </div>
                <div class="form-group">
                  <label for="city" class="custom-label">City:</label>
                  <select id="city" name="city" class="form-control" required>
                    <option value="" disabled selected>Choose City</option> <!-- Default selection -->
                    @foreach($cities as $city)
                    <option value="{{ $city->city }}">{{ $city->city }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="industry" class="custom-label">Industry:</label>
                  <select id="industry" name="industry" class="form-control" required>
                    <option value="" disabled selected>Select Industry</option> <!-- Default selection -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="positions" class="custom-label">Available Positions:</label>
                  <input type="number" id="positions" name="positions" class="form-control" min="1" required>
                </div>
                <div class="form-group">
                  <label for="price" class="custom-label">Price:</label>
                  <input type="number" id="price" name="price" class="form-control" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>
<script>
  // Display selected weeks for duration range input
  document.getElementById('duration_weeks').addEventListener('input', function() {
    document.getElementById('selectedWeeks').textContent = this.value;
  });
</script>
<!-- Add this script in your HTML -->
<script>
  $(document).ready(function(){
    $('#city').change(function(){
      var city = $(this).val();
      $.ajax({
        url: "{{ url('/get-industries') }}",
        type: 'POST',
        data: {
          _token: "{{ csrf_token() }}",
          city: city
        },
        success: function(response) {
          var options = '<option value="" disabled selected>Select Industry</option>';
          for(var i = 0; i < response.length; i++) {
            options += '<option value="' + response[i].name + '">' + response[i].name + '</option>';
          }
          $('#industry').html(options);
        }
      });
    });
  });
</script>
<script>
  // Update hidden input field with selected duration value
  document.getElementById('duration_weeks').addEventListener('input', function() {
    var duration = this.value;
    document.getElementById('selectedWeeks').textContent = duration;
    document.getElementById('duration_value').value = duration;
  });
</script>
</body>
</html>
