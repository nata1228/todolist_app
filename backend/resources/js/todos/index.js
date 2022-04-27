import { createApp } from "vue";
import Axios from "axios";
import axios from "axios";

createApp({
    data() {
        return {
            hoge: 'adachi',
            jojo: "jojo",
            counter: 0,
            testInput: "",
            todos:[]
        };
    },
    mounted() {
        console.log("sss");
    },
    methods: {
        clickButton(){
            this.counter ++;
        },
        testAxios(){
            axios.post("/todo/info", {
                body: this.testInput
            })
            .then((res => {
                console.log(res);
            })
            .catch((e) => {
                console.log(e);
                console.log("error");
            })
        },
        getAxios(){
            axios.get("/todo/get")
            .then((res) => {
                console.log(res);
                this.todos = res.data;
            })
        }
    }
}).mount("#counter");