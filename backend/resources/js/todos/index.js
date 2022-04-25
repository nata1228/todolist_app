import { createApp } from "vue";

createApp({
    data() {
        return {
            hoge: 'adachi',
            jojo: "jojo",
            counter: 0
        };
    },
    mounted() {
        console.log("sss");
    },
    methods: {
        clickButton(){
            this.counter ++;
        }
    }
}).mount("#counter");