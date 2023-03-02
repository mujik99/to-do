<template>
    <Header />
    <div class="container py-3">
        <div class="row">
            <div class="input-group mb-3">
                <input type="text" v-model="newTaskName" class="form-control" placeholder="Task name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" @click="addTask()" type="button">Add task</button>
                </div>
            </div>
        </div>
        <div class="task-list">
            <div
                v-for="task in tasks"
                :key="task.id"
                class="custom-control custom-checkbox task"
            >
                <input type="checkbox" :checked="task.status === 2" class="custom-control-input" :id="task.id" @change="changeTask( task.id, task.status )">
                <label
                    :for="task.id"
                    :class="['custom-control-label', task.status === 2 && 'done-task']"
                >{{ task.title }}</label>
                <button type="button" class="close" @click="deleteTask(task.id)" data-dismiss="alert" aria-label="Delete">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <Footer />
</template>

<script>

import Header from "./Header.vue";
import Footer from "./Footer.vue";
import Store from  "../store/index";

export default {
    name: "App",
    components: { Header, Footer },
    computed: {
        tasks() {
            return this.state.getters['toDoItems/toDoList'];
        },
    },
    data() {
        return {
            newTaskName: '',
            title: '',
            state: Store,
        };
    },
    methods : {
        addTask : function () {
            if(this.newTaskName === '') {
                alert("Task name can't be empty");
                return false;
            }

            this.state.dispatch("toDoItems/createTask", {title: this.newTaskName});
            this.newTaskName = '';

            const length = this.state.state.toDoItems.toDoList.length + 1;
            if (length % 3 === 0) {
                const task = this.state.state.toDoItems.toDoList[length - 3];
                if (task.status !== 2) {
                    this.state.dispatch("toDoItems/changeTaskStatus",  {id: task.id, status: task.status});
                }
            }

        },
        changeTask: function (id, currentStatus) {
            this.state.dispatch("toDoItems/changeTaskStatus", {id: id, status: currentStatus});
        },
        deleteTask : function (id) {
            if (confirm('Do you want to delete')) {
                this.state.dispatch("toDoItems/deleteTask", {id: id});
            }
        }
    },
    mounted() {
        this.title = 'To Do App';
        this.state.dispatch('toDoItems/getToDoList');
    }
}
</script>
