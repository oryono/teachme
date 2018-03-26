import router from './router'
import store from './store/store'
import { sync } from 'vuex-router-sync'
import App from './components/App'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

sync(store, router)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        App
    },

    created: function () {
        window.axios.interceptors.response.use(function (response) {
            return response;
        }, function (error) {
            // Do something with response error
            router.push({name: 'login'})
            console.log('Interceptor running')
            return Promise.reject(error);
        });
    }
});


