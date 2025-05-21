<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body {
            max-width: 800px;
            /* 最大幅を800pxに設定 */
            margin: 0 auto;
            /* 中央揃えにするためのマージン */
            padding: 20px;
            /* 内側の余白 */
        }
    </style>
</head>

<body>
    <h1>投稿一覧</h1>
    <hr>
    <a href="/posts/create">新規作成</a>
    <hr>
    <div class="posts">
        @foreach ($posts as $post)
        <div class="post">
            <h2 class="title">
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <p class="body">{{ $post->body }}</p>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
            </form>
            <hr>
        </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</body>

</html>