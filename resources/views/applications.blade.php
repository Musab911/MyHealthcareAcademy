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
</head>

<body class="bg-theme bg-theme1">

@extends('layouts.sidebar')

@section('content')
@endsection
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Applications</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Internship Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">First Industry</th>
                                        <th scope="col">First Field 1</th>
                                        <th scope="col">First Field 2</th>
                                        <th scope="col">First Field 3</th>
                                        <th scope="col">First Field 4</th>
                                        <th scope="col">First Field 5</th>
                                        <th scope="col">Second Industry</th>
                                        <th scope="col">Second Field 1</th>
                                        <th scope="col">Second Field 2</th>
                                        <th scope="col">Second Field 3</th>
                                        <th scope="col">Second Field 4</th>
                                        <th scope="col">Second Field 5</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Duration (Weeks)</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Price</th>
                                       
                                        <th scope="col">Native Language</th>
                                        <th scope="col">English Level</th>
                                        <th scope="col">Motivation</th>
                                        <th scope="col">Degree</th>
                                    </tr>
                                </thead>
                                <tbody>
    @foreach ($applications as $application)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $application->internship_name }}</td>
            <td>{{ $application->firstName }}</td>
            <td>{{ $application->lastName }}</td>
            <td>{{ $application->dateOfBirth }}</td>
            <td>{{ $application->gender }}</td>
            <td>{{ $application->nationality }}</td>
            <td>{{ $application->phone }}</td>
            <td>{{ $application->emailAddress }}</td>
            <td>{{ $application->first_industry }}</td>
            <td>{{ $application->first_field1 }}</td>
            <td>{{ $application->first_field2 }}</td>
            <td>{{ $application->first_field3 }}</td>
            <td>{{ $application->first_field4 }}</td>
            <td>{{ $application->first_field5 }}</td>
            <td>{{ $application->second_industry }}</td>
            <td>{{ $application->second_field1 }}</td>
            <td>{{ $application->second_field2 }}</td>
            <td>{{ $application->second_field3 }}</td>
            <td>{{ $application->second_field4 }}</td>
            <td>{{ $application->second_field5 }}</td>
            <td>{{ $application->city }}</td>
            <td>{{ $application->duration_weeks }}</td>
            <td>{{ $application->start_date }}</td>
            <td>{{ $application->price }}</td>
            <td>{{ $application->nativeLanguage }}</td>
            <td>{{ $application->englishLevel }}</td>
            <td>{{ $application->motivation }}</td>
            <td>{{ $application->degree }}</td>
        </tr>
    @endforeach
</tbody>

                            </table>
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
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>

</body>
</html>
