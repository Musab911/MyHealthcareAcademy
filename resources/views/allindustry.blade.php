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
<!-- Your index page content goes here -->
@endsection

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <h1>Industries</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Field</th>
          </tr>
        </thead>
        <tbody>
          @foreach($industries as $industry)
          <tr>
            <td>{{ $industry->id }}</td>
            <td>{{ $industry->name }}</td>
            <td>{{ $industry->city }}</td>
            <td>{{ $industry->field }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div><!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

</div><!--End wrapper-->
</body>
</html>
