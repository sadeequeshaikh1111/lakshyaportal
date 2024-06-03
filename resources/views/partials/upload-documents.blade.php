<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Documents</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Upload Documents</h2>
        <form id="documentForm" enctype="multipart/form-data">
            <input type="hidden" id="editId">
            <div class="form-group row">
                <label for="documentCategory" class="col-sm-3 col-form-label">Document Category:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="documentCategory" name="documentCategory" required>
                        <option value="">Select Category</option>
                        <option value="Educational document">Educational Document</option>
                        <option value="Identity document">Identity Document</option>
                        <option value="Address proof">Address Proof</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="documentFile" class="col-sm-3 col-form-label">Upload File:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="documentFile" name="documentFile" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-container mt-5" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="documentTable" class="display">
            <thead>
                <tr>
                    <th>Document Category</th>
                    <th>File Name</th>
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
        var table = $('#documentTable').DataTable();

        $('#documentForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            // Handle AJAX form submission here

            // Example of adding a new row to the DataTable
            table.row.add([
                $('#documentCategory').val(),
                $('#documentFile')[0].files[0].name,
                '<button class="btn btn-sm btn-danger delete-btn">Delete</button>'
            ]).draw();

            // Reset form
            $('#documentForm')[0].reset();
        });

        // Handle delete action
        $('#documentTable tbody').on('click', '.delete-btn', function() {
            table.row($(this).parents('tr')).remove().draw();
        });
    });
</script>

</body>
</html>
