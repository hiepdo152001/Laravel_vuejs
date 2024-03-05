<template>
<ChildTest :message="message" @test="test"/>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import ChildTest from "./Child.vue";
export default defineComponent({
    name: "ParentTest",
    components:{
        ChildTest
    },
    data(){
        return {
            message: "hello"
        }
    },
    methods:{
        test(){
            alert('123');
            console.log(this.$store.state.user.username);
            console.log(this.$store.getters.firstName);
            this.$store.commit("changeName", "New Name");
            console.log(this.$store.getters.firstName);

        }
    }
});
</script>