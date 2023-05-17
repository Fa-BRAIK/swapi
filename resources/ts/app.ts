import "./bootstrap";
import { createApp } from "vue";
import router from "./routes/index.routes";
import i18n from './i18n/index.translator';
import App from "./App.vue";

createApp(App).use(router).use(i18n).mount("#app");
