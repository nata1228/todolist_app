import { createApp } from "vue";
import axios from "axios";

createApp({
    data() {
        return {
            hoge: 'adachi',
            jojo: "jojo",
            counter: 0,
            testInput: "",
            newTodo: "",
            todos: []
        };
    },
    mounted() {
        console.log("sss");
        this.getAxios();
    },
    methods: {
        clickButton(){
            this.counter ++;
        },
        testAxios(){
            axios.post("/todo/info", {
                body: this.testInput
            })
            .then(res => {
                console.log(res);
            })
            .catch(e => {
                console.log(e);
                console.log("error");
            })
        },
        getAxios(){
            axios.get("/todo/get")
            .then(res => {
                console.log(res.data);
                this.todos = res.data;
            })
        },
        addTodoAxios:function(){
            console.log(this.new_todo);
                axios.post('/todo/store',{
                    title: this.new_todo
                }).then((res)=>{
                    this.todos = res.data
                    this.new_todo = ''
                })
        },
    }
}).mount("#counter");