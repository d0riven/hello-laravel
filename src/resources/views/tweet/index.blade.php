<!doctype html>
<html lang="ja">
<body>
    <h1>つぶやきアプリ</h1>
    <div>
    @foreach($tweets as $tweet)
        <p>{{  $tweet->content }}</p>
    @endforeach
    </div>
</body>
</html>
