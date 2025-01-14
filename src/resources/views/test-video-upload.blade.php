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
        <input type="file" name="video" accept="video/*">
        <button type="submit">アップロード</button>
    </form>
</body>
</html>