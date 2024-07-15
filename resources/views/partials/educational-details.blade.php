<!DOCTYPE html>
<html lang="en">
<head>
<script src="{{ asset('assets\js\jquery.min.js')}}"></script>
<script src="{{ asset('assets\js\jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets\js\bootstrap.min.js')}}"></script>
<link href="{{ asset('assets\css\bootstrap.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Details</title>

</head>
<body>

<div class="container mt-5">
    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Educational Details</h2>
        <form id="educationForm">
            <input type="hidden" id="editId">
            <div class="form-group row">
                <label for="universityBoard" class="col-sm-3 col-form-label">University/Board:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="universityBoard" name="universityBoard" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="collegeInstitute" class="col-sm-3 col-form-label">College/Institute:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="collegeInstitute" name="collegeInstitute" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="edu_category" class="col-sm-3 col-form-label">edu_category:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="edu_category" name="edu_category" required>
                        <option value="">Select edu_category</option>
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Graduation">Graduation</option>
                        <option value="Post Graduation">Post Graduation</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="course" class="col-sm-3 col-form-label">Course:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="course" name="course" required>
                        <option value="">Select Course</option>
                        <option value="Arts">Arts</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Science">Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Computer Applications">Computer Applications</option>
                        <option value="IT">IT</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="passingYear" class="col-sm-3 col-form-label">Passing Year:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="passingYear" name="passingYear" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="cgpaPercentage" class="col-sm-3 col-form-label">CGPA/Percentage:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cgpaPercentage" name="cgpaPercentage" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="yearOfPassing" class="col-sm-3 col-form-label">Year of Passing:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="yearOfPassing" name="yearOfPassing" required>
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="button" class="btn btn-primary" onclick="save()">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-5">
        <h2>Educational Details</h2>
        <table class="table table-bordered" id="eduDetailsTable">
            <thead>
                <tr>
                    <th>University/Board</th>
                    <th>College/Institute</th>
                    <th>Category</th>
                    <th>Course</th>
                    <th>Passing Year</th>
                    <th>CGPA/Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>



<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var email = "{{ session('basicDetails')['email'] }}";

$(document).ready(function() {
    alert("We are ready"+email);
    //fetchEducationalDetails(email,0);
   // fetchEducationalDetails_ajax(email,'B')


try {
    fetchEducationalDetails_ajax(email);
} catch (error) {
    alert('An error occurred: ' + error.message);
}

   
    console.log("Edu detail loaded");
    // Your other initialization code here
});

    function save() {
                alert(email,0);
                

        var formData = {
            universityBoard: $('#universityBoard').val(),
            collegeInstitute: $('#collegeInstitute').val(),
            passingYear: $('#passingYear').val(),
            cgpaPercentage: $('#cgpaPercentage').val(),
            yearOfPassing: $('#yearOfPassing').val(),
            edu_category: $('#edu_category').val(),
            course: $('#course').val(),
            editId: $('#editId').val(),
            email:email
        };

        // Perform validation
        if (!formData.universityBoard || !formData.collegeInstitute || !formData.passingYear || !formData.cgpaPercentage || !formData.yearOfPassing || !formData.edu_category || !formData.course) {
            alert("All fields are required.");
            return;
        }

        // Example of handling form submission or AJAX call
        // Replace with your implementation
        alert("Data inserted: " + JSON.stringify(formData));
        $.ajax({
        type: 'POST',
        url: "{{ route('save_edu_details.post') }}",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response.message); // Show success message
            $('#educationForm')[0].reset(); // Reset form
            $('#editId').val(''); // Clear editId if needed
            fetchEducationalDetails_ajax(email);
        },
        error: function(xhr, status, error) {
            alert('An error occurred while saving data.');
            console.error(error);
        }
    });
        // Reset form
        $('#educationForm')[0].reset();
        $('#editId').val('');
    }
    
function fetchEducationalDetails_ajax(email) {
    console.log("Trying to load data");

    $('#eduDetailsTable').DataTable({
    processing: true,
    serverSide: true,
    destroy: true,
    ajax: {
        url: "{{ route('get_eduDetails_ajax.get') }}",
        type: "GET",
        data: {
            email: email // Pass email as a parameter if needed
        }
    },
    columns: [
        
        { data: 'university_board', name: 'university_board' },
        { data: 'college_institute', name: 'college_institute' },
        {data:'edu_category',name:'edu_category'},
        {data:'course',name:'course'},

        { data: 'passing_year', name: 'passing_year' },
        { data: 'cgpa_percentage', name: 'cgpa_percentage' },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return data; // Render HTML content for actions
            }
        }
    ]
});

}
function Delete(id) {
    console.log("Trying to delete data with ID:", id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('delete_edu_detail.delete') }}",
        type: "DELETE",
        data: {
            id: id
        },
        success: function(response) {
            console.log("Data deleted successfully:");
            console.log(response);
            fetchEducationalDetails_ajax(email);
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
}


</script>

</body>
</html>
