<!doctype html>
<html lang="ja">
<body>
    <h1>つぶやきアプリ</h1>
    <div>
        <p>投稿フォーム</p>
        <form action="{{route('tweet.create')}}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
            @error('tweet')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
        </form>
    </div>
    <div>
        @foreach($tweets as $tweet)
            <details>
                <summary>{{ $tweet->content }}</summary>
                <div>
                    <a href=" {{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                </div>
            </details>
        @endforeach
    </div>
</body>
</html>
