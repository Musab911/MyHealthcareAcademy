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
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
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

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6 mx-auto">
                <div class="content">
                    <div class="card-body">
                        <div class="card-title">Add City Form</div>
                        <hr>
                        <div class="cityform">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
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

                            <form action="{{ route('cities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="input-1"><b>City</b></label>
                                    <input type="text" class="form-control" id="input-1" name="city" placeholder="Enter City Name" value="{{ old('city') }}">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="accommodation" name="accommodation" value="1">
                                    <label class="form-check-label" for="accommodation"><b>Accommodation</b></label>
                                </div>
                                <div class="form-group" id="accommodation-price-group" style="display:none;">
                                    <label for="accommodation-price"><b>Accommodation Price (£)</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">£</span>
                                        </div>
                                        <input type="number" class="form-control" id="accommodation-price" name="accommodation_price" placeholder="Enter Accommodation Price">
                                    </div>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- simplebar js -->
<script src="assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="assets/js/sidebar-menu.js"></script>
<!-- Custom scripts -->
<script src="assets/js/app-script.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const accommodationCheckbox = document.getElementById('accommodation');
    const accommodationPriceGroup = document.getElementById('accommodation-price-group');

    accommodationCheckbox.addEventListener('change', function() {
        if (this.checked) {
            accommodationPriceGroup.style.display = 'block';
        } else {
            accommodationPriceGroup.style.display = 'none';
        }
    });
});
</script>

</body>
</html>
