<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>News</title>
</head>
<body>
    @include('navbar') <!-- Assuming you have a navbar partial -->

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12"> 
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>News
                            <a href="{{ route('news.create') }}" class="btn btn-primary float-end">Add News</a>
                        </h4>
                        <div class="form-group mt-2">
                            <label for="filter">Filter:</label>
                            <select id="filter" class="form-select">
                                <option value="all">All News</option>
                                <option value="active">Active News</option>
                                <option value="inactive">Inactive News</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body table-responsive border-top border-primary">
                        <table class="table table-bordered border-primary table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($news) && $news->count() > 0)
                                    @foreach ($news as $newsItem)
                                        <tr>
                                            <td>{{ $newsItem->id }}</td>
                                            <td>{{ $newsItem->title }}</td>
                                            <td>{{ $newsItem->description }}</td>
                                            <td><img src="{{ asset($newsItem->image) }}" alt="News Image" style="max-width: 100px;"></td>
                                            <td>{{ $newsItem->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Record Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#filter').change(function() {
        var status = $(this).val();
        $.ajax({
            url: '{{ route("news.filter") }}',
            type: 'POST',
            data: { status: status },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Replace the table body with the filtered data
                $('.table tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>


</body>
</html>
