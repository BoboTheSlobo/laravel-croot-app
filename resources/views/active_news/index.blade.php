<!-- resources/views/active_news/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Daily News</title>
    <style>
        .card {
            height: 100%;
        }

        .card-img-top {
            object-fit: cover;
            height: 300px; /* Set the desired height */
        }

        .news_container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" href="#">NEWS</a>
    </div>
  </nav>
</div>

<div class="container news_container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($activeNews as $news)
        <div class="col mb-4">
            <div class="card border-dark h-100">
                <img src="{{ $news->image }}" class="card-img-top" alt="news image">
                <div class="card-body">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text">{{ substr($news->description, 0, 50) }}...</p>
                    <!-- Button to Open Modal -->
                    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#myModal{{ $news->id }}">
                        View Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $news->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ $news->image }}" class="img-fluid" alt="news image">
                        <p>{{ $news->description }}</p>
                        <!-- Add other information as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>