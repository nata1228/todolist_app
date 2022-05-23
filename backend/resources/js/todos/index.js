import { createApp } from "vue";
import axios from "axios";

createApp({
    data() {
        return {
            hoge: 'adachi',
            jojo: "jojo",
            counter: 0,
            testInput: "",
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
                    this.todos.push(this.newTodo)
                    this.newTodo.body = '';
                    this.newTodo.limit = '';
                })
        },
        deleteTodo(id){
            axios.post("/delete/{id}",{
                id
            }).then.res(res => {
                this.todos = res.data
            })
        }
    }
}).mount("#counter");