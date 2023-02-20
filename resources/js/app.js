import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import App from './App.vue';

/***************************
 * Register components
 ***************************/
const app = createApp({});
app.component('app', App);

app.mount('#app');