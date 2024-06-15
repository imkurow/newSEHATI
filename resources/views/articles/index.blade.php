<!-- resources/views/articles/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newest Articles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Newest Article</h1>
        <div class="search-bar mb-4">
            <input type="text" class="form-control" placeholder="Search article based on topics, title, category">
        </div>
        <div class="article-list">
            @foreach ($articles as $article)
                <div class="card mb-3 {{ $loop->first ? 'border-primary' : '' }}">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $article->image_path }}" class="card-img" alt="{{ $article->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                </h5>
                                <p class="card-text">{{ Str::limit($article->content, 150, '...') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
