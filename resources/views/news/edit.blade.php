<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>News Edit</title>
</head>
<body>
@include('navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit News Item</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" value="{{ $news->title }}" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" name="description" style="height:100px" placeholder="Description">{{ $news->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control">
                            @if ($news->image)
                                <img src="{{ asset($news->image) }}" alt="News Image" style="max-width: 200px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <strong>Status:</strong>
                            <select name="status" class="form-control">
                                <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update News</button>
                            <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>