<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>編集画面</title>
</head>
<body>
    <form action="{{route('todo.update')}}" method="post">
    @csrf
        <input type="hidden" name="id" value="{{$todos->id}}">
        <input type="text" name="body" value="{{$todos->body}}">
        <input type="date" name="limit" value="{{$todos->limit}}">
        <button type="button" class="btn btn-success">更新する</button>
    </form>
</body>
</html>