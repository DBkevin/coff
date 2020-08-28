import Vue from 'vue';
import router from './routes.js'
window._ = require('lodash');
try {
    window.$ = window.jQuery = require('jquery');
    require('foundation-sites');
} catch (e) { }
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
new Vue({
    router
}).$mount('#app')