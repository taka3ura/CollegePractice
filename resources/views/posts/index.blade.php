<x-app-layout>
    <div class="header2">
        <h1>投稿一覧</h1>
        <p>ログインユーザー <strong>{{ Auth::user()->name }}</strong></p>
        <hr>
        <p><a href="/posts/create">新規作成</a></p>
        <hr>
    </div>
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
                <button type="button" class="delete" onclick="deletePost({{ $post->id }})">削除する</button>
            </form>
        </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <div class="posts">
        <h1>質問一覧</h1>
        <div class="post">
            @foreach($questions as $question)
            <a href="https://teratail.com/questions/{{ $question['id'] }}">{{ $question['title'] }}</a><br>
            <hr>
            @endforeach
        </div>
    </div>
    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>