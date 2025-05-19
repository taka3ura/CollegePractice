<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <h1>投稿一覧</h1>
    <a href="/posts/create">新規作成</a>
    <div class="posts">
        @foreach ($posts as $post)
        <div class="post">
            <h2 class="title">
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class="body">{{ $post->body }}</p>
            <hr>
        </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
</body>

</html>