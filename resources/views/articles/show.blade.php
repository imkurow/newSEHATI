<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $article->title }}</h1>
        <p><em>{{ $article->created_at->format('F j, Y') }}</em></p>
        <img src="{{ $article->image_path }}" class="img-fluid mb-3" alt="{{ $article->title }}">
        <div class="content">
            {!! nl2br(e($article->content)) !!}
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3">Back to Articles</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>