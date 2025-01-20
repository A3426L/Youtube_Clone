<div>
<form action="test"></form>
</div>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>動画アップロード</title>
</head>
<body>
    <h1>動画アップロード</h1>
    
    @if (Auth::check())
        <p>ログイン中のユーザー: {{ Auth::user()->name }}</p>
        <p>メールアドレス: {{ Auth::user()->email }}</p>
    @else
        <p>ログインしていません。</p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tests/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="タイトル">
        <input type="text" name="description" placeholder="説明">
        <input type="file" name="thumbnail" accept="image/*">
        <input type="text" name="user_id" placeholder="ユーザーID">
        <input type="file" name="video" accept="video/*">
        <button type="submit">アップロード</button>
    </form>

    @if (!empty($storeVideo))
        <p>{{ $storeVideo }}</p>
        <video src="{{ asset('storage/'.$storeVideo)}}" controls></video>
    @else
        <p>動画はアップロードされていません</p>
    @endif
</body>
</html>