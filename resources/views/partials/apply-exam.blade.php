<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Exams</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Apply for Exams</h2>
        <form id="applyExamForm">
            <div class="form-group row">
                <label for="examSelect" class="col-sm-3 col-form-label">Select Exam:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="examSelect" name="examSelect">
                        <option value="MHCET">MHCET</option>
                        <option value="BEd CET">BEd CET</option>
                        <option value="LLB CET">LLB CET</option>
                        <option value="Arts CET">Arts CET</option>
                        <option value="Medical CET">Medical CET</option>
                        <option value="Pharma CET">Pharma CET</option>
                        <option value="Nursing CET">Nursing CET</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-container mt-5" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="appliedExamTable" class="display">
            <thead>
                <tr>
                    <th>Exam</th>
                    <th>Registration Number</th>
                    <th>Fees</th>
                    <th>Payment Status</th>
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
        var table = $('#appliedExamTable').DataTable();

        $('#applyExamForm').submit(function(e) {
            e.preventDefault();

            var exam = $('#examSelect').val();

            // Handle AJAX request to apply for exam

            // Example of adding a new row to the DataTable
            table.row.add([
                exam,
                'REG123456',  // Example registration number, replace with actual data
                'Pending',    // Example payment status, replace with actual data
                '<button class="btn btn-sm btn-danger delete-btn">Delete</button> <button class="btn btn-sm btn-primary payment-btn">Make Payment</button>'
            ]).draw();
        });

        // Handle delete action
        $('#appliedExamTable tbody').on('click', '.delete-btn', function() {
            table.row($(this).parents('tr')).remove().draw();
        });

        // Handle payment action
        $('#appliedExamTable tbody').on('click', '.payment-btn', function() {
            var row = table.row($(this).parents('tr')).data();
            // Handle payment process
            alert('Initiate payment process for ' + row[0]);
        });
    });
</script>

</body>
</html>
