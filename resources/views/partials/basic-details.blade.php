<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Details</title>
    <style>
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .form-row div {
            width: 48%;
        }
        .form-row label {
            width: 30%;
        }
        .form-row input, .form-row select, .form-row textarea {
            width: 65%;
            padding: 8px;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
{{ auth()->id() }}

    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-row">
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') ?: (session()->has('basicDetails') ? session('basicDetails')['first_name'] : '') }}" required autofocus autocomplete="given-name">
                    <div class="error">{{ $errors->first('first_name') }}</div>
                </div>
                <div>
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') ?: (session()->has('basicDetails') ? session('basicDetails')['middle_name'] : '') }}" autocomplete="additional-name">
                    <div class="error">{{ $errors->first('middle_name') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') ?: (session()->has('basicDetails') ? session('basicDetails')['last_name'] : '') }}" required autocomplete="family-name">
                    <div class="error">{{ $errors->first('last_name') }}</div>
                </div>
                <div>
                    <label for="mother_name">Mother's Name:</label>
                    <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') ?: (session()->has('basicDetails') ? session('basicDetails')['mothers_name'] : '') }}" autocomplete="additional-name">
                    <div class="error">{{ $errors->first('mother_name') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob') ?: (session()->has('basicDetails') ? session('basicDetails')['date_of_birth'] : '') }}" required>
                    <div class="error">{{ $errors->first('dob') }}</div>
                </div>
                <div>
                    <label for="permanent_address">Permanent Address:</label>
                    <textarea id="permanent_address" name="permanent_address" rows="3" required>{{ old('permanent_address') }}</textarea>
                    <div class="error">{{ $errors->first('permanent_address') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="error">{{ $errors->first('gender') }}</div>
                </div>
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">Select</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="error">{{ $errors->first('category') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="country">Country:</label>
                    <select id="country" name="country" required autocomplete="country"  onchange="loadStates(this.value)">
                        <option value="">Select Country</option>
                    </select>
                    <div class="error">{{ $errors->first('country') }}</div>
                </div>
                <div>
                    <label for="state">State:</label>
                    <select id="state" name="state" required autocomplete="state" onchange="loaddistricts(country.value,this.value)">
                        <option value="">Select State</option>
                    </select>
                    <div class="error">{{ $errors->first('state') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="district">District:</label>
                    <select id="district" name="district" required autocomplete="district">
                        <option value="">Select District</option>
                    </select>
                    <div class="error">{{ $errors->first('district') }}</div>
                </div>
                <div>
                    <label for="taluka">Taluka:</label>
                    <input type="text" id="taluka" name="taluka" value="{{ old('taluka') }}" required autocomplete="address-level3">
                    <div class="error">{{ $errors->first('taluka') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="mobile_number">Mobile Number:</label>
                    <input type="tel" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="tel">
                    <div class="error">{{ $errors->first('mobile_number') }}</div>
                </div>
                <div>
                    <label for="exam_location_1">Preferred Exam Location 1:</label>
                    <input type="text" id="exam_location_1" name="exam_location_1" value="{{ old('exam_location_1') }}" required>
                    <div class="error">{{ $errors->first('exam_location_1') }}</div>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="exam_location_2">Preferred Exam Location 2:</label>
                    <input type="text" id="exam_location_2" name="exam_location_2" value="{{ old('exam_location_2') }}" required>
                    <div class="error">{{ $errors->first('exam_location_2') }}</div>
                </div>
                <div>
                    <label for="exam_location_3">Preferred Exam Location 3:</label>
                    <input type="text" id="exam_location_3" name="exam_location_3" value="{{ old('exam_location_3') }}" required style="width: 100%;">
                    <div class="error">{{ $errors->first('exam_location_3') }}</div>
                </div>
            </div>

            <!-- Footer -->
            <div class="form-row" style="justify-content: flex-end;">
            <button type="button" onclick="saveAndNext()" style="background-color: #6366F1; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save and Next</button>
            </div>
        </form>
    </div>
</body>
</html>




 
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="{{ asset('assets\js\basic-details-jscript.js')}}"> pageload setup</script>

  <script>
  

    $(document).ready(function() {
        // Show the basic details view initially
      try{

       // alert_function();
       getBasicDetails();
       set_old_category();
      // fetchLocations("type", parentId = null)
      // setDOB();
      loadCountries();
      }
      catch(err)
      {
        //alert(err);

      }
      

        });



function set_select_country()
{
  var country = "{{ session('basicDetails')['country'] }}";
 // console.log("setting country")

 // alert(country)
  if(country=="")
  {
      country=""
  }

  //alert("setting"+country);
  var countrySelect = document.getElementById('country');
  
  for (var i = 0; i < countrySelect.options.length; i++) 
  {
      if (countrySelect.options[i].text === country) {
          countrySelect.selectedIndex = i;
          loadStates(i);
          
         // alert("Loading states");
          break;
      }
  }

}

function set_select_state(country_id)
{
//  alert("Country ID "+country_id)
  //console.log("setting state")
  var state = "{{ session('basicDetails')['state'] }}";
 // alert("setting " +state);
  if(state=="")
  {
      state=""
  }

  //alert("setting"+state);
  var state_select = document.getElementById('state');

  for (var i = 0; i < state_select.options.length; i++) 
  {
      if (state_select.options[i].text === state) {
          state_select.selectedIndex = i;
       //   alert("loading districts");
       //alert("Loading state"+state );
        //  loaddistricts(country_id, i);
        //  set_district()
         // set_district(1);
         


          //loadStates(i);
         // alert("Loading states");
         return i;

      }
  }

}

function set_district()
{
    
 // alert("Country ID "+country_id)
 // console.log("setting state")
  var dist = "{{ session('basicDetails')['district'] }}";
  if(dist=="")
  {
      dist=""
  }
  //alert("Dist :"+dist)

 // alert("setting"+dist);
  var district_select = document.getElementById('district');

  for (var i = 0; i < district_select.options.length; i++) 
  {
    //console.log("dist list len :::"+district_select.options.length)
   // console.log("dist in list"+district_select.options[i].text)
    //console.log("dist "+district_select.options[i].text);
      if (district_select.options[i].text === dist) {
        district_select.selectedIndex = i;

         // alert("old dist retrived");
          //loaddistricts(country_id, i)
          //alert("district name in list"+district_select.options[i].text)
          //loadStates(i);
         // alert("Loading states");
          break;
      }
      else{//alert("district name in list"+district_select.options[i].text)
        }
  }

}


function set_old_category() {
    var cat = "{{ session('basicDetails')['Category'] }}";
    //alert(cat)
    var category_select = document.getElementById('category');

    for (var i = 0; i < category_select.options.length; i++) {
       // console.log(category_select.options[i].text)
        if (category_select.options[i].text === cat) {
            category_select.selectedIndex = i;
            break;
        }
    }
}




function loadStates1(str)
{
saveAndNext();

}

function saveAndNext() {
    // Perform any save operations or navigation logic here
    alert("Save and Next clicked!"); // Example alert, replace with your logic
    console.log("saving basic details");
    saveBasicDetails();
}
function saveBasicDetails() {
    // Basic validations
    var requiredFields = [
        { id: '#first_name', name: 'First Name' },
        { id: '#last_name', name: 'Last Name' },
        { id: '#dob', name: 'Date of Birth' },
        { id: '#permanent_address', name: 'Permanent Address' },
        { id: '#gender', name: 'Gender' },
        { id: '#country', name: 'Country' },
        { id: '#state', name: 'State' },
        { id: '#district', name: 'District' },
        { id: '#taluka', name: 'Taluka' },
        { id: '#mobile_number', name: 'Mobile Number' },
        { id: '#exam_location_1', name: 'Preferred Exam Location 1' },
        { id: '#exam_location_2', name: 'Preferred Exam Location 2' },
        { id: '#exam_location_3', name: 'Preferred Exam Location 3' }
    ];

    for (var i = 0; i < requiredFields.length; i++) {
        var field = requiredFields[i];
        if ($(field.id).val().trim() === '') {
            alert(field.name + ' is required.');
            $(field.id).focus();
            return;
        }
    }

    var email = "{{ session('basicDetails')['email'] }}";

    var basicDetails = {
        email: email,
        first_name: $('#first_name').val(),
        middle_name: $('#middle_name').val(),
        last_name: $('#last_name').val(),
        mother_name: $('#mother_name').val(),
        dob: $('#dob').val(),
        permanent_address: $('#permanent_address').val(),
        gender: $('#gender option:selected').text(),
        country: $('#country option:selected').text(),
        state: $('#state option:selected').text(),
        district: $('#district option:selected').text(),
        taluka: $('#taluka').val(),
        mobile_number: $('#mobile_number').val(),                                                                         
        exam_location_1: $('#exam_location_1').val(),
        exam_location_2: $('#exam_location_2').val(),
        exam_location_3: $('#exam_location_3').val()
        // Add any other fields here if necessary
    };

    $.ajax({
        url: '{{ route("save_basic_details.put") }}',
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: 'application/json',
        data: JSON.stringify(basicDetails),
        success: function(response) {
           // console.log('Basic details saved successfully:', response);
            // Handle success response as needed
            alert('Basic details saved successfully!');
        },
        error: function(xhr, status, error) {
            console.error('Error saving basic details:', error);
            // Handle error response as needed
            alert('Error saving basic details: ' + error);
        }
    });
}


  
  </script>