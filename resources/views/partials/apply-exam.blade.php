<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Exams Demo</title>
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
                     
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button  onclick=applyExam() class="btn btn-primary">Apply</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-container mt-5" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="appliedExamTable" class="display">
            <thead>
                <tr>
                
                    <th>Exam</th>
                    <th>Payment Status</th>
                    <th>Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated via JavaScript -->
            </tbody>
        </table>
        <div class="text-right mt-3">
            <button id="consolidatedPaymentBtn" class="btn btn-success">Make Consolidated Payment</button>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    
    $(document).ready(function() {
        load_exams();
        fetch_applied_exams();
        var table = $('#appliedExamTable').DataTable();
alert("apply test")

    });


    function load_exams() {
        var exams = [];
            $.ajax({
                url: "{{ route('load_exams.get') }}",
                type: "get",
                data: {
                    email: email,
                    user_id:user_id
                },
                success: function(response) {
                    console.log("Data loaded successfully:", response);
                    exams = response;

                    console.log(exams);
                    populate_examSelect(exams)
                  //  populateDocumentSelect(documents);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", error);
                }
            });
        }

        function populate_examSelect(exams) {
        var examSelect = $('#examSelect');
        examSelect.empty(); // Clear any existing options
        examSelect.append('<option value="">Select Exam</option>');

        exams.forEach(function(exm) {
            examSelect.append('<option value="' + exm + '">' + exm + '</option>');
        });
    }

    function Apply_exam(table) {
            var email = "{{ session('basicDetails')['email'] }}";
    var user_id = "{{ session('basicDetails')['User_id'] }}";
        var formData = new FormData($('#documentForm')[0]);
        alert(formData);
        formData.append('email', email);
        formData.append('user_id', user_id);
        formData.append('exam_name', exam_name);

        
        $.ajax({
            url: '{{ route("save_document_details.post") }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Upload details saved successfully:', response);
                alert('Upload details saved successfully!');
                fetch_doc_details_ajax(email);

                $('#documentForm')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error saving upload details:', error);
                alert('Error saving upload details: ' + error);
            }
        });
    }

    function applyExam() {
        alert("Appliy exam clicked")
        event.preventDefault(); // Prevent the default form submission
        var email = "{{ session('basicDetails')['email'] }}";
        var user_id = "{{ session('basicDetails')['User_id'] }}";
    var examName = $('#examSelect').val(); // Get the selected exam name from the dropdown

    // Create a FormData object to send the data
    var formData = new FormData();
    formData.append('user_id', user_id);
    formData.append('exam_name', examName);
    formData.append('email', email);

    // AJAX request to apply for the exam
    $.ajax({
        url: '{{ route("apply_exam.post") }}', // Update with your route for applying exams
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log('Exam applied successfully:', response);
            alert('Exam applied successfully!');
            $('#applyExamForm')[0].reset(); // Reset the form after successful submission
            fetch_applied_exams();
        },
        error: function(xhr, status, error) {
            console.error('Error applying for exam:', error);
            alert('Error applying for exam: ' + error);
        }
    });
}

function fetch_applied_exams() {
    var email = "{{ session('basicDetails')['email'] }}";
    var user_id = "{{ session('basicDetails')['User_id'] }}";

    $('#appliedExamTable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: "{{ route('fetch_applied_exams.get') }}",
            type: "GET",
            data: {
                email: email, // Pass email as a parameter if needed
                user_id:user_id

            }
        },

        columns: [
        { data: 'exam_name', name: 'exam_name' },
        { data: 'Payment_Status', name: 'Payment_Status' },
        { data: 'Fees', name: 'Fees' },
    
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

function Delete_applied_exam(id) {
    if (confirm('Are you sure you want to delete this exam?  ')) {
        $.ajax({
            url: '{{ route('Delete_applied_exam.delete') }}', // Use the correct route
            type: 'DELETE',
            data: { id: id },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Applied exam deleted successfully:', response);
                alert('Applied exam deleted successfully!');
                // Reload the table after deletion
                $('#appliedExamTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error deleting applied exam:', error);
                alert('Error deleting applied exam: ' + error);
            }
        });
    }
}




    
    
</script>

</body>
</html>
