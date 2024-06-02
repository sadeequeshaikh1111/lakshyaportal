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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-container mt-5" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="educationTable" class="display">
            <thead>
                <tr>
                    <th>University/Board</th>
                    <th>College/Institute</th>
                    <th>Passing Year</th>
                    <th>CGPA/Percentage</th>
                    <th>Year of Passing</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated via JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#educationTable').DataTable();

        $('#educationForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                universityBoard: $('#universityBoard').val(),
                collegeInstitute: $('#collegeInstitute').val(),
                passingYear: $('#passingYear').val(),
                cgpaPercentage: $('#cgpaPercentage').val(),
                yearOfPassing: $('#yearOfPassing').val(),
                editId: $('#editId').val()
            };

            // Handle AJAX form submission here

            // Example of adding a new row to the DataTable
            if (!formData.editId) {
                table.row.add([
                    formData.universityBoard,
                    formData.collegeInstitute,
                    formData.passingYear,
                    formData.cgpaPercentage,
                    formData.yearOfPassing,
                    '<button class="btn btn-sm btn-primary edit-btn">Edit</button> <button class="btn btn-sm btn-danger delete-btn">Delete</button>'
                ]).draw();
            } else {
                // Update existing row
            }

            // Reset form
            $('#educationForm')[0].reset();
            $('#editId').val('');
        });

        // Handle edit and delete actions
        $('#educationTable tbody').on('click', '.edit-btn', function() {
            var data = table.row($(this).parents('tr')).data();
            $('#universityBoard').val(data[0]);
            $('#collegeInstitute').val(data[1]);
            $('#passingYear').val(data[2]);
            $('#cgpaPercentage').val(data[3]);
            $('#yearOfPassing').val(data[4]);
            $('#editId').val(data[5]); // Assuming you have an ID field in your data
        });

        $('#educationTable tbody').on('click', '.delete-btn', function() {
            table.row($(this).parents('tr')).remove().draw();
        });
    });
</script>

</body>
</html>
