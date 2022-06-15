import { createApp } from "vue";
import axios from "axios";

createApp({
    data() {
        return {
            flagDisabled: true,
            newTodo: {
                body: "",
                limit: "",
            },            
            todos: [],
        };
    },
    mounted() {
        this.getTodoList();
    },
    methods: {
        getTodoList(){
            axios.get("/todo/get")
            .then(res => {
                console.log(res.data);
                this.todos = res.data;
            })
        },
        addTodo(){
            console.log(this.newTodo.body);
                axios.post("/todo/store",{
                    body: this.newTodo.body,
                    limit: this.newTodo.limit
                }).then(res => {
                    this.getTodoList()
                    this.newTodo.body = '';
                    this.newTodo.limit = '';
                })
        },
        deleteTodo(id){
            console.log(id);
            axios.post(`/todo/delete/${id}`)
            .then(res => {
                this.getTodoList()
            })
        },editTodo(index){
            console.log(index);
            console.log(this.todos[index]);
            this.todos[index].disabled = false;
            console.log(this.todos[index]);
        },
        editFinish(todo){
            axios.post("/todo/update",{
                body: todo.body,
                limit: todo.limit,
                id: todo.id
            }).then(res => {
                this.getTodoList()
                this.oldTodo = '';
            })
        }
    }
}).mount("#counter");