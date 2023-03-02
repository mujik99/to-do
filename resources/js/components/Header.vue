<template>
    <header class="d-flex flex-wrap justify-content-center border-bottom items-center p-3">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="mb-2" src="img/logo.png" alt="logo" width="85px">
            <span class="ml-4 fs-4">{{ title }}</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        </ul>
    </header>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "Header",
  data() {
    return {
      title: '',
    };
  },
  mounted() {
      this.title = 'To Do App';
  },
});
</script>
