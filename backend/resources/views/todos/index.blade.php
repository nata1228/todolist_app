<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"  type="text/css" href="css/index.css">
    <title>Todoリスト</title>
</head>
<body>
    <div class="add">
        <form action="{{route('todo.store')}}" method="post">
        @csrf
            <input type="text" name="body">
            <input type="date" name="limit">
            <button class="btn btn-warning" type="submit">追加</button>
        </form>
    </div>

    <div class="main">
        @foreach($todos as $todo)
            <div class='a'>
                <div class="contents">
                    <p>{{$todo->body}}</p>
                    <p>{{$todo->limit}}</p>
                </div>
                
                <div class="button">
                    <a href="/todo/{{$todo->id}}" class="btn btn-primary" type="submit">編集</a>
                    <form action="{{route('todo.delete',['id' => $todo->id])}}"  method="post">
                    @csrf
                        <button  class="btn btn-danger" type="submit">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>