<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Documents</title>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Upload Documents</h2>
        <form id="documentForm" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for Laravel -->
            <input type="hidden" id="editId">
            <div class="form-group row">
                <label for="documentCategory" class="col-sm-3 col-form-label">Document Category:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="documentCategory" name="documentCategory" required onchange="load_docs(this.value)">
                        <option value="">Select Category</option>
                        <option value="Educational document">Educational Document</option>
                        <option value="Identity document">Identity Document</option>
                        <option value="Address proof">Address Proof</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="document" class="col-sm-3 col-form-label">Document:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="document_select" name="document" required>
                        <option value="">Select Document</option>
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

<script>
    var email = "{{ session('basicDetails')['email'] }}";
    var user_id = "{{ session('basicDetails')['User_id'] }}";
    var x="{{ session('basicDetails') }}";
    alert("user id is "+user_id);
    
    $(document).ready(function() {
        var table = $('#documentTable').DataTable();
        fetch_doc_details_ajax(email);
        $('#documentForm').submit(function(e) {
            e.preventDefault();
            save_documentdetails(table);
        });

        // Handle delete action
        $('#documentTable tbody').on('click', '.delete-btn', function() {
            table.row($(this).parents('tr')).remove().draw();
            fetch_doc_details_ajax(email);
        });
    });

    function load_docs(category) {
        console.log("Trying to Load documents for category:", category);

        var documents = [];

        if (category === "Educational document") {
            $.ajax({
                url: "{{ route('load_docs.get') }}",
                type: "get",
                data: {
                    email: email,
                    user_id:user_id
                },
                success: function(response) {
                    console.log("Data loaded successfully:", response);
                    documents = response;
                    populateDocumentSelect(documents);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", error);
                }
            });
        } else if (category === "Identity document") {
            documents = ["Adhaar card", "Voters Id", "Passport", "Driving Licence"];
            populateDocumentSelect(documents);
        } else if (category === "Address proof") {
            documents = ["Electricity bill", "Adhar Card", "Property Tax Receipt", "Domicile certificate"];
            populateDocumentSelect(documents);
        } else if (category === "Other") {
            var documentSelect = $('#document_select');
            documentSelect.empty(); // Clear any existing options
            documentSelect.append('<option value="">Select Document</option>');
            documentSelect.append('<option value="Other">Other</option>');
            documentSelect.after('<input type="text" class="form-control mt-2" id="otherDocument" name="otherDocument" placeholder="Specify other document">');
        } else {
            populateDocumentSelect(documents); // Clear dropdown for unspecified category
        }
    }

    function populateDocumentSelect(documents) {
        var documentSelect = $('#document_select');
        documentSelect.empty(); // Clear any existing options
        documentSelect.append('<option value="">Select Document</option>');

        documents.forEach(function(doc) {
            documentSelect.append('<option value="' + doc + '">' + doc + '</option>');
        });
    }

    function save_documentdetails(table) {
        
        var formData = new FormData($('#documentForm')[0]);
        alert(formData);
        formData.append('email', email);
        formData.append('user_id', user_id);
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


    function fetch_doc_details_ajax(email) {
    console.log("Trying to load data for "+email);

    $('#documentTable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: "{{ route('fetch_doc_details.get') }}",
            type: "GET",
            data: {
                email: email, // Pass email as a parameter if needed
                user_id:user_id

            }
        },

        columns: [

        { data: 'category', name: 'category' },
        { data: 'file_name', name: 'file_name' },
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
function Delete_doc(id) {
    console.log("Trying to delete data with ID:", id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('delete_doc_detail.delete') }}",
        type: "DELETE",
        data: {
            id: id
        },
        success: function(response) {
            console.log("Data deleted successfully:");
            console.log(response);
            fetch_doc_details_ajax(email);
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
