import axios from 'axios';
import { createApp } from 'vue';
import datatable from '@hexgad/vue3-laravel-datatables';
import { ZiggyVue } from './ziggy.vue.es.js';


window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


Object.entries(import.meta.glob('./components/*.vue', { eager: true })).forEach(([path, definition]) => {
    console.log(`Module 'countries' loaded component:  ${path.split('/').pop().replace(/\.\w+$/, '')}`);
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.use(datatable).use(ZiggyVue).mount('#app');
