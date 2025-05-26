<x-app-layout>
    <h1 class="title">
        {{ $post->title }}
    </h1>
    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
    <div class="content">
        <div class="content_post">
            <h3>本文</h3>
            <p>{{ $post->body }}</p>
        </div>
    </div>
    <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集する</a></div>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</x-app-layout>