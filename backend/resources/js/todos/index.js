import { createApp } from "vue";
import axios from "axios";

createApp({
    data() {
        return {
            testDisabled: true,
            newTodo: {
                body: "",
                limit: "",
            },            
            todos: []
        };
    },
    mounted() {
        this.getAxios();
    },
    methods: {
        getAxios(){
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
                    this.todos = res.data
                    this.newTodo.body = '';
                    this.newTodo.limit = '';
                })
        },
        deleteTodo(id){
            console.log(id);
            axios.post(`/todo/delete/${id}`)
            .then(res => {
                this.todos = res.data
            })
        },editTodo(){
            this.testDisabled = false
        },
        editFinish(body ,limit){
            console.log(body ,limit);
            axios.post("/todo/update",{
                body: body,
                limit: limit
            }).then(res => {
                this.todos = res.data
                this.testDisabled = true
            })
        }
    }
}).mount("#counter");