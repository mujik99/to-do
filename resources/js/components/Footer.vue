<template>
    <footer class="footer mt-auto py-3 bg-light border-top bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md flex justify-center items-center">
                    <img src="img/logo.png" alt="footer logo" width="35">
                    <small class="ml-4 d-block text-muted">&copy; {{ copyright }}</small>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "Footer",
  data() {
    return {
      copyright: '',
    };
  },
  mounted() {
      this.copyright = ' All rights reserved 2023';
  },
});
</script>
