<template>
    <h1>{{ message }}</h1>
    <button @click="test">click</button>

    </template>
    <script lang="ts">
        import { defineComponent } from 'vue';
        export default defineComponent({
            name: "ChildTest",
            props:{
                message:{
                    type: String
                }
            },
            methods:{
                test(){
                    this.$emit('test');
                }
            }
        });
    </script>