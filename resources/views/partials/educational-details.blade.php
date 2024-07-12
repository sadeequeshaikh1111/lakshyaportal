<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Details</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function save() {
        var formData = {
            universityBoard: $('#universityBoard').val(),
            collegeInstitute: $('#collegeInstitute').val(),
            passingYear: $('#passingYear').val(),
            cgpaPercentage: $('#cgpaPercentage').val(),
            yearOfPassing: $('#yearOfPassing').val(),
            edu_category: $('#edu_category').val(),
            course: $('#course').val(),
            editId: $('#editId').val()
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
</script>

</body>
</html>
