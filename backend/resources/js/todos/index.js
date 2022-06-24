import { createApp } from "vue";
import axios from "axios";

createApp({
    data() {
        return {
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
                this.todos = res.data;
            })
        },
        addTodo(){
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
            axios.post(`/todo/delete/${id}`)
            .then(res => {
                this.getTodoList()
            })
        },editTodo(index){
            this.todos[index].disabled = false;
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