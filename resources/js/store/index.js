import { createStore } from "vuex";
import toDoTasks from "./toDoTasks";

export default createStore({
  modules: {
    toDoItems: toDoTasks
  },
});
