function alert_function()
{
    //alert("function called");
}


function getBasicDetails() {
    console.log("Entering getBasicDetails");
    $.ajax({
        url: "/getBasicDetails", // Replace with your actual route path
        method: "GET",
        data:{user_id:user_id},
        success: function(response) {
            console.log(response); // For debugging purposes

            // Updating UI elements with the retrieved data
            $("#permanent_address").val(response.permanent_address || '');

            // Handling gender selection
            var genderIndex;
            if (response.gender?.toLowerCase() === "male") {
                genderIndex = 1;
            } else if (response.gender?.toLowerCase() === "female") {
                genderIndex = 2;
            } else if (response.gender?.toLowerCase() === "other") {
                genderIndex = 3;
            } else {
                genderIndex = 0; // Default to first option if no match
            }
            $("#gender option").eq(genderIndex).prop('selected', true);

            // Set other fields
            $("#country").val(response.country || '');
            $("#state").val(response.state || '');
            $("#district").val(response.district || '');
            $("#taluka").val(response.taluka || '');
            $("#mobile_number").val(response.mobile_number || '');
            $("#exam_location_1").val(response.preferred_exam_location_1 || '');
            $("#exam_location_2").val(response.preferred_exam_location_2 || '');
            $("#exam_location_3").val(response.preferred_exam_location_3 || '');
            $("#mother_name").val(response.mother_name || '');
            $("#middle_name").val(response.middle_name || '');
            $("#last_name").val(response.last_name || '');

            
            

        },
        error: function(jqXHR, textStatus, errorThrown) {
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
               // console.log(response); // For debugging purposes
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
        country_id=parentId;
$.ajax({
    url: "/getLocations/states", // Route to fetch states data
    method: "GET",
    data: { parentId: parentId }, // Pass parentId as data
    success: function(response) {
        //console.log(response); // Log the response for debugging

        // Check if the response is an array
        if (Array.isArray(response)) {
            var options = '<option value="">Select State</option>';
            // Append each state as an option in the select list
            response.forEach(function(state) {
                options += '<option value="' + state.id + '">' + state.name + '</option>';
            });
            // Set the HTML of the select element with the options
            $('#state').html(options);
          //  console.log("States loaded successfully");
          //  alert("Loaded states")
           stateid= set_select_state(country_id);
           count= loaddistricts(country_id,stateid);
           // set_district(count);
        } else {
            console.error("Unexpected response format:", response);
            alert("Unexpected response format. Failed to fetch states!");
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
        alert("Failed to fetch states!");
    }
});
}

//load districts
function loaddistricts(countryId, stateId) {
   // alert("loading districts with country id"+countryId+" stateId"+stateId);

    $.ajax({
        url: "/getLocations/districts", // Route to fetch districts data
        method: "GET",
        data: { countryId: countryId, stateId: stateId }, // Pass countryId and stateId as data
        success: function(response) {
            //console.log(response); // Log the response for debugging

            // Check if the response is an array
            if (Array.isArray(response)) {
                var options = '<option value="">Select District</option>';
                // Append each district as an option in the select list
                response.forEach(function(district) {
                    options += '<option value="' + district.id + '">' + district.name + '</option>';
                });
                // Set the HTML of the select element with the options
                $('#district').html(options);
               // console.log("Districts loaded successfully");

                set_district();
               // alert("Loaded districts");
            } else {
                console.error("Unexpected response format:", response);
                alert("Unexpected response format. Failed to fetch districts!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
            alert("Failed to fetch districts!");
        }
    });
}


//loaded districts
//savedata
