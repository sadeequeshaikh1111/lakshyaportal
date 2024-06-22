<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Details</title>
</head>
<body>
{{ auth()->id() }}

    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="first_name" style="width: 20%;">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') ?: (session()->has('basicDetails') ? session('basicDetails')['first_name'] : '') }}" required autofocus autocomplete="given-name" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="middle_name" style="width: 20%;">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') ?: (session()->has('basicDetails') ? session('basicDetails')['middle_name'] : '') }}" autocomplete="additional-name" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('first_name') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('middle_name') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="last_name" style="width: 20%;">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') ?: (session()->has('basicDetails') ? session('basicDetails')['last_name'] : '') }}" required autocomplete="family-name" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="mother_name" style="width: 20%;">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') ?: (session()->has('basicDetails') ? session('basicDetails')['mothers_name'] : '') }}" autocomplete="additional-name" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('last_name') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('mother_name') }}</div>
            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
    <!-- Date of Birth -->
    <label for="dob" style="width: 20%;">Date of Birth:</label>
    <input type="date" id="dob" name="dob" value="{{ old('dob') ?: (session()->has('basicDetails') ? session('basicDetails')['date_of_birth'] : '') }}" required style="width: 30%; padding: 8px; margin-right: 2%;">
    <span style="margin-right: 5px;">&emsp;</span>
    <!-- Permanent Address -->
    <label for="permanent_address" style="width: 20%;">Permanent Address:</label>
    <textarea id="permanent_address" name="permanent_address" rows="3" style="width: 30%; padding: 8px;" required>{{ old('permanent_address') }}</textarea>
</div>
<div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">
    {{ $errors->first('dob') }}
</div>
<div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">
    {{ $errors->first('permanent_address') }}
</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="gender" style="width: 20%;">Gender:</label>
                <select id="gender" name="gender" required style="width: 30%; padding: 8px; margin-right: 2%;">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <span style="margin-right: 5px;">&emsp;</span>
           <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
    <label for="country" style="width: 20%;">Country:</label>
    <select id="country" name="country" required autocomplete="country" style="width: 30%; padding: 8px;">
        <option value="">Select Country</option>
    </select>
</div>
              </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('gender') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('country') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="state" style="width: 20%;">State:</label>
                <input type="text" id="state" name="state" value="{{ old('state') }}" required autocomplete="address-level1" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="district" style="width: 20%;">District:</label>
                <input type="text" id="district" name="district" value="{{ old('district') }}" required autocomplete="address-level2" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('state') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('district') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="taluka" style="width: 20%;">Taluka:</label>
                <input type="text" id="taluka" name="taluka" value="{{ old('taluka') }}" required autocomplete="address-level3" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="mobile_number" style="width: 20%;">Mobile Number:</label>
                <input type="tel" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="tel" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('taluka') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('mobile_number') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="exam_location_1" style="width: 20%;">Preferred Exam Location 1:</label>
                <input type="text" id="exam_location_1" name="exam_location_1" value="{{ old('exam_location_1') }}" required style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="exam_location_2" style="width: 20%;">Preferred Exam Location 2:</label>
                <input type="text" id="exam_location_2" name="exam_location_2" value="{{ old('exam_location_2') }}" required style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_1') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_2') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="exam_location_3" style="width: 20%;">Preferred Exam Location 3:</label>
                <input type="text" id="exam_location_3" name="exam_location_3" value="{{ old('exam_location_3') }}" required style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_3') }}</div>

            <!-- Footer -->
            <div class="flex" style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" style="background-color: #6366F1; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save and Next</button>
            </div>
        </form>
    </div>
</body>
</html>



 
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>


  <script>
  

    $(document).ready(function() {
        // Show the basic details view initially
       getBasicDetails();
       fetchLocations("type", parentId = null)
      // setDOB();
      loadCountries();
      
      
      
      
      



        });

        function getBasicDetails() {
  $.ajax({
    url: "/getBasicDetails", // Replace with your actual route path
    method: "GET",
    success: function(response) {
      // Handle successful response
      console.log(response); // For debugging purposes
      // Update your UI elements with the retrieved data (replace with your logic)
      
$("#permanent_address").val(response.permanent_address);
var gender_index;
if (response.gender.toLowerCase() === "male") {
  gender_index = 1;
} else if (response.gender.toLowerCase() === "female") {
  gender_index = 2;
} else if (response.gender.toLowerCase() === "other") {
  gender_index = 3;
} else {
  gender_index = 4; // or any default value you want
}
$("#gender option").eq(gender_index).prop('selected', true);


$("#country").val(response.country);
$("#state").val(response.state);
$("#district").val(response.district);
$("#taluka").val(response.taluka);
$("#mobile_number").val(response.mobile_number);
$("#exam_location_1").val(response.preferred_exam_location_1);
$("#exam_location_2").val(response.preferred_exam_location_2);
$("#exam_location_3").val(response.preferred_exam_location_3);


       // Assuming response contains a 'name' property
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // Handle errors
      console.error("Error:", textStatus, errorThrown);
      alert("Failed to get details!");
    }
  });
}

function fetchLocations(type, parentId = null) {
        let url = `/getLocations/${type}`;
        if (parentId) {
            url += `?parentId=${parentId}`;
        }

        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                console.log(response); // For debugging purposes
                // Add your logic to handle the response data here
                // Example: populate a dropdown or process data
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error:", textStatus, errorThrown);
                alert("Failed to fetch locations!");
            }
        });
    }


    function loadCountries() {
            $.ajax({
                url: "/getLocations/countries", // Route to fetch countries data
                method: "GET",
                success: function(response) {
                    console.log(response); // For debugging purposes
                    var options = '<option value="">Select Country</option>';
                    // Append each country as an option in the select list
                    response.forEach(function(country) {
                        options += '<option value="' + country.id + '">' + country.name + '</option>';
                    });
                    // Set the HTML of the select element with the options
                    $('#country').html(options);
                    //get current selected country
                    set_select_country();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error:", textStatus, errorThrown);
                    alert("Failed to fetch countries!");
                }
            });
        }


        function loadStates(parentId) {
    $.ajax({
        url: "/getLocations/states", // Route to fetch states data
        method: "GET",
        data: { parentId: parentId }, // Pass parentId as data
        success: function(response) {
            console.log(response); // For debugging purposes
            var options = '<option value="">Select State</option>';
            // Append each state as an option in the select list
            response.forEach(function(state) {
                options += '<option value="' + state.id + '">' + state.name + '</option>';
            });
            // Set the HTML of the select element with the options
            console.log("states loaded");
            $('#state').html(options);
            // Select the default state based on session data or other logic
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
            alert("Failed to fetch states!");
        }
    });
}
   function set_select_country()
  {
    console.log("setting country")
    var country = "{{ session('basicDetails')['country'] }}";
    alert(country);
    var countrySelect = document.getElementById('country');
    for (var i = 0; i < countrySelect.options.length; i++) 
    {
      console.log(countrySelect.options[i].value+" "+country)
        if (countrySelect.options[i].text === country) {
            countrySelect.selectedIndex = i;
            loadStates(i);
            alert("index is" + i)
            break;
        }
    }

  }

  </script>