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
  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>
  <!-- end loader -->
  @extends('layouts.sidebar')

@section('content')
<!-- Your index page content goes here -->
@endsection

    <div class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-6 mx-auto"> <!-- Centering content -->
            <div class="content">
              <div class="card-body">
                <div class="card-title">Add Industry</div>
                <hr>
                <div class="container mt-5">
                
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('industries.store') }}" method="POST" id="industryForm">
  @csrf

  <!-- Industry Input -->
  <div class="form-group">
    <label for="industry"><b>Industry</b></label>
    <input type="text" class="form-control" id="industry" name="industry" placeholder="Enter Industry Name" value="{{ old('industry') }}" required>
  </div>

  <!-- Initial City and Field Input -->
  <div class="form-group" id="form-group-0">
    <div class="row">
      <div class="col-md-6 form-group">
        <label for="city-0"><b>City</b></label>
        <select class="form-control" id="city-0" name="cities[]" required>
          <option value="">Select City</option>
          @foreach($cities as $city)
            <option value="{{ $city->city }}" {{ old('cities.0') == $city->city ? 'selected' : '' }}>{{ $city->city }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12 form-group">
        <label for="field-0"><b>Field</b></label>
        <div class="input-group">
          <input type="text" class="form-control" id="field-0" name="fields[0][]" placeholder="Enter Field" value="{{ old('fields.0.0') }}" required>
          <div class="input-group-append">
            <button class="btn btn-primary add-tag" type="button" data-index="0">Add Field</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3" id="field-tags-0">
      <!-- Field Tags will be appended here -->
    </div>
  </div>

  <!-- Dynamic City and Field Inputs -->
  <div id="dynamic-form">
    @if (old('cities'))
      @for ($i = 1; $i < count(old('cities')); $i++)
        <div class="form-group" id="form-group-{{ $i }}">
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="city-{{ $i }}"><b>City</b></label>
              <select class="form-control" id="city-{{ $i }}" name="cities[]" required>
                <option value="">Select City</option>
                @foreach($cities as $city)
                  <option value="{{ $city->city }}" {{ old('cities.'.$i) == $city->city ? 'selected' : '' }}>{{ $city->city }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <label for="field-{{ $i }}"><b>Field</b></label>
              <div class="input-group">
                <input type="text" class="form-control" id="field-{{ $i }}" name="fields[{{ $i }}][]" placeholder="Enter Field" value="{{ old('fields.'.$i.'.0') }}" required>
                <div class="input-group-append">
                  <button class="btn btn-primary add-tag" type="button" data-index="{{ $i }}">Add Field</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3" id="field-tags-{{ $i }}">
            <!-- Field Tags will be appended here -->
          </div>
          <button type="button" class="btn btn-danger mt-3 remove-form-group" data-index="{{ $i }}">Remove</button>
        </div>
      @endfor
    @endif
  </div>

  <button type="button" class="btn btn-info mt-3" id="addMoreFields"><i class="fa fa-plus"></i> Add More Cities</button>
  <button type="submit" class="btn btn-success mt-3">Save</button>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let formGroupCounter = {{ count(old('cities', [])) }};
    const dynamicForm = document.getElementById('dynamic-form');
    const addMoreFieldsButton = document.getElementById('addMoreFields');
    const cities = @json($cities);

    addMoreFieldsButton.addEventListener('click', function() {
        formGroupCounter++;
        const newFormGroup = document.createElement('div');
        newFormGroup.className = 'form-group';
        newFormGroup.id = `form-group-${formGroupCounter}`;
        newFormGroup.innerHTML = `
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="city-${formGroupCounter}"><b>City</b></label>
                    <select class="form-control" id="city-${formGroupCounter}" name="cities[]" required>
                        <option value="">Select City</option>
                        ${cities.map(city => `<option value="${city.city}">${city.city}</option>`).join('')}
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 form-group">
                    <label for="field-${formGroupCounter}"><b>Field</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="field-${formGroupCounter}" name="fields[${formGroupCounter}][]" placeholder="Enter Field" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary add-tag" type="button" data-index="${formGroupCounter}">Add Field</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" id="field-tags-${formGroupCounter}">
                <!-- Field Tags will be appended here -->
            </div>
            <button type="button" class="btn btn-danger mt-3 remove-form-group" data-index="${formGroupCounter}">Remove</button>
        `;
        dynamicForm.appendChild(newFormGroup);

        // Add tag functionality to the new field
        newFormGroup.querySelector('.add-tag').addEventListener('click', function() {
            addTag(formGroupCounter);
        });

        // Add event listener to the remove button
        newFormGroup.querySelector('.remove-form-group').addEventListener('click', function() {
            removeFormGroup(formGroupCounter);
        });
    });

    // Initialize add tag buttons
    document.querySelectorAll('.add-tag').forEach(function(button) {
        button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            addTag(index);
        });
    });

    // Initialize remove buttons
    document.querySelectorAll('.remove-form-group').forEach(function(button) {
        button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            removeFormGroup(index);
        });
    });

    // Function to add a tag
    function addTag(index) {
        const fieldInput = document.getElementById(`field-${index}`);
        const fieldValue = fieldInput.value.trim();
        if (fieldValue === '') return;

        const tagContainer = document.getElementById(`field-tags-${index}`);
        const tagElement = document.createElement('span');
        tagElement.className = 'badge badge-info mr-2';
        tagElement.innerHTML = `
            ${fieldValue}
            <button type="button" class="btn btn-sm btn-danger ml-2 remove-tag">&times;</button>
        `;
        tagContainer.appendChild(tagElement);

        // Add the tag value to a hidden input
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `fields[${index}][]`;
        hiddenInput.value = fieldValue;
        tagContainer.appendChild(hiddenInput);

        fieldInput.value = '';

        // Remove tag functionality
        tagElement.querySelector('.remove-tag').addEventListener('click', function() {
            tagContainer.removeChild(tagElement);
            tagContainer.removeChild(hiddenInput);
        });
    }

    // Function to remove a form group
    function removeFormGroup(index) {
        const formGroup = document.getElementById(`form-group-${index}`);
        formGroup.parentNode.removeChild(formGroup);
    }

    // Client-side form validation before submission
    document.getElementById('industryForm').addEventListener('submit', function(event) {
        const fields = document.querySelectorAll('input[name^="fields"]');
        for (const field of fields) {
            if (!field.value.trim()) {
                event.preventDefault();
                alert('Please fill in all fields.');
                field.focus();
                break;
            }
        }
    });
});
</script>

    </div>
  </div><!--End wrapper-->
</body>
</html>
