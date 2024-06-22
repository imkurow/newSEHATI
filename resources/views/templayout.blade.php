<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="resources/css/app.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sehati')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="icon" type="image/png" sizes="30x30" href="img/sehati-heart.svg">
    

    <style>
        body{
            background-color: #b2f7ef;
        }
    </style>
  </head>
  <body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
