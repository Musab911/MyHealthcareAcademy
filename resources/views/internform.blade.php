<!DOCTYPE html>
<html>
<head>
  <style>
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

<div class="container">
  <h1>So, tell us about yourself...</h1>

  <form  method="POST">
    @csrf
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" id="firstName" name="firstName" placeholder="First Name">
    </div>

    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" id="lastName" name="lastName" placeholder="Last Name">
    </div>

    <div class="form-group">
      <label for="dateOfBirth">Date of Birth </label>
      <input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth">
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
  <select id="motivation" name="motivation">
    <option value="" selected disabled>What motivates you to join our program?</option>
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
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
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
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
});
</script>
</body>
</html>
