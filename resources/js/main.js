import { createApp } from "vue/dist/vue.esm-bundler";
import Contents from "./components/cms/Contents.vue";

const app = createApp({
    components: {
        Contents,
    }
});
app.mount("#app");
