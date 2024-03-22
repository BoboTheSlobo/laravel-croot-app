<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <title>Universities</title>
</head>
<body>
@include('navbar')

<div class="container mt-5">
    <button id="fetchButton" class="btn btn-primary">Fetch Universities</button>
    <div id="universitiesTableDiv" class="mt-3">
        <table id="universitiesTable" class="table table-bordered border-primary table-striped my-3 table-responsive">
            <thead>
                <tr class="text-center">
                    <th>University</th>
                    <th>Country Code</th>
                    <th>Country</th>
                    <th>Domain</th>
                    <th>Web Page</th>
                </tr>
            </thead>
            <tbody>
                <!-- Universities data will be dynamically added here -->
            </tbody>
        </table>
    </div>
    <nav id="paginationNav" aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <!-- Pagination links will be added dynamically here -->
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#universitiesTable').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 10, // Default number of entries per page
            "lengthMenu": [10, 30, 50], // Options for number of entries per page
            "processing": true,
            "language": {
                "processing": "Loading..." // Loading message
            }
        });

        $('#fetchButton').click(function () {
            fetchUniversities();
        });

        function fetchUniversities() {
            $.ajax({
                type: 'GET',
                url: 'http://universities.hipolabs.com/search?country=United+States',
                success: function (data) {
                    updateTable(data);
                },
                error: function () {
                    console.error('Error fetching data from the server.');
                }
            });
        }

        function updateTable(data) {
    var table = $('#universitiesTable').DataTable();
    table.clear().draw(); // Clear existing rows
    
    if (data && data.length > 0) {
        data.forEach(function(university) {
            table.row.add([
                university.name,
                university.alpha_two_code,
                university.country,
                university.domains ? university.domains.join(', ') : '',
                university.web_pages ? university.web_pages.join(', ') : ''
            ]).draw(false);
        });
    } else {
        console.error('No data received from the server.');
    }
}

    });
</script>
</body>
</html>
