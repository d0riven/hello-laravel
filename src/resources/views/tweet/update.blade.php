<!doctype html>
<html lang="ja">
<head>
    <title>つぶやきアプリ</title>
</head>
<body>
<h1>つぶやきを編集する</h1>
<div>
    <a href="{{ route('tweet.index') }}">戻る</a>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
        @method('PUT')
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140文字まで</span>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
        @error('tweet')
        <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit">編集</button>
    </form>
</div>
</body>
</html>
