<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'

const todoLists = ref([]);
const newTodo = ref('');
const addLists = () => {
    if (newTodo !== ''){
        console.log('test');
        router.post('/add', {todos: newTodo.value, completed: false})
        newTodo.value = '';
    }
};
const delLists = (index) => {
    const url = `/delete/${index}`;
    router.delete(url);
};
</script>

<template>
    <h1>ToDo</h1>
    <input type="text" size="30" v-model="newTodo">
    <button @click="addLists">Add</button>
    <ul>
        <li style="list-style: none;" v-for="(todoList, i) in todoLists">
            <button @click="delLists(i)">X</button> {{ todoList }}
        </li>
    </ul>
</template>

