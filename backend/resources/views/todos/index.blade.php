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
    <div id="counter" v-cloak>
        <div class="add">
                <input type="text" name="body" v-model="newTodo.body">
                <input type="date" name="limit" v-model="newTodo.limit">
                <button class="btn btn-warning" @click="addTodo">追加</button>
        </div>

        <div class="main">
                <div class="main-container" v-for="(todo, index) in todos" :key="todo">
                    <div class="contents">
                        <input type="text" v-model="todo.body" v-bind:disabled="todo.disabled" >
                        <input type="date" v-model="todo.limit" v-bind:disabled="todo.disabled" >
                    </div> 
                    
                    <div class="switch">
                        <button class="btn btn-primary" @click="editTodo(index)" v-if="todo.disabled">編集</button>
                        <button class="btn btn-primary" @click="editFinish(todo)" v-else>完了</button>
                        <button  class="btn btn-danger" @click="deleteTodo(todo.id)">削除</button>
                    </div>
                </div>
        </div>
    </div>
    <script src="{{ mix('js/dist/todos/index.js') }}"></script>
</body>
</html>


