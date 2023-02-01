<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Post</title>
</head>
<body>
<h1>New post created By {{ $name }}</h1>
<a href="https://portal/posts/{{ $slug }}">{{ $title }}</a>
<img src="{{ $image}}"width="200" alt="">
</body>
</html>
