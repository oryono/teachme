import router from './router'
import store from './store/store'
import { sync } from 'vuex-router-sync'
import App from './components/App'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios')

sync(store, router)




const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        App
    }
});


