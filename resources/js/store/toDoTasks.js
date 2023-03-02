export default {
    namespaced: true,
    state: {
        toDoList: [],
    },
    getters: {
        toDoList(state) {
            return state.toDoList;
        },
        taskById: (state) => (id) => {
            return state.toDoList.find((item) => item.id === id);
        }
    },
    actions: {
        getToDoList(state) {
            return new Promise((resolve, reject) => {
                fetch('/api/getToDo').then(res => {
                    return res.json()
                }).then(data => {
                    state.commit('setToDoList', data);
                    resolve(data);
                })
                    .catch(err => reject(err))
            })
        },
        createTask(state, data) {
            return new Promise((resolve, reject) => {
                fetch('/api/createTask', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    return res.json()
                }).then(data => {
                    state.commit('addTaskToList', data);

                    // console.log(state.state.toDoList);
                    // if (state.state.toDoList.length % 3 === 0) {
                    //     const task = state.state.toDoList[state.state.toDoList.length - 3];
                    //     // changeTaskStatus(state, {id: task.id, status: task.status});
                    //     // state.dispatch("toDoItems/changeTaskStatus", {id: task.id, status: task.status});
                    // }

                    resolve(data);
                })
                    .catch(err => reject(err))
            })
        },
        deleteTask(state, data) {
            return new Promise((resolve, reject) => {
                fetch('/api/deleteTask', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    return res.json()
                }).then(data => {
                    state.commit('deleteTaskFromList', data);
                    resolve(data);
                })
                    .catch(err => reject(err))
            })
        },
        changeTaskStatus(state, data) {
            return new Promise((resolve, reject) => {
                fetch('/api/updateStatus', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    return res.json()
                }).then(data => {
                    state.commit('changeTaskStatus', data);
                    resolve(data);
                })
                    .catch(err => reject(err))
            })
        },
    },
    mutations: {
        setToDoList(state, data) {
            state.toDoList = data;
        },
        addTaskToList(state, data) {
            state.toDoList.push(data);
        },
        deleteTaskFromList(state, data) {
            const index = state.toDoList.findIndex((item) => item.id === data);
            state.toDoList.splice(index, 1);
        },
        changeTaskStatus(state, data) {
            const task = state.toDoList.find((item) => item.id === data.id);
            task.status = data.status;
        }
    }
}
