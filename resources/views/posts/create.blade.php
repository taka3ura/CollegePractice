<x-app-layout>
    <h1>新規投稿</h1>
    <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>タイトル</h2>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}" />
            <p class="title_error" style="color: red;">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="body">
            <h2>本文</h2>
            <textarea name="post[body]" placeholder="今日も一日お疲れさまでした。">{{ old('post.body') }}</textarea>
            <p class="body_error" style="color: red;">{{ $errors->first('post.body') }}</p>
        </div>
        <div class="category">
            <h2>カテゴリー</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="store" />
    </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</x-app-layout>