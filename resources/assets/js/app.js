// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRouter from 'vue-router';
import VueSession from 'vue-session'
import VueAxios from 'vue-axios'
import Axios from 'axios'
/*
* Import VueJS Template
*/
import App from './App.vue';
import Navbar from './components/layout/navbar';
/*
* Import Configuration
*/
import routes from './routes.js';

let Router = new VueRouter({
    hashbang: false,
    mode: 'history',
    base: __dirname,
    routes: routes,
    linkActiveClass: "",
    linkExactActiveClass: "",
});


/**
 * Mixins
 * @type Object
 */
let Mixins = {
    computed: {
        asset: function() {
            return asset();
        },
        appName: function() {
            return appName();
        },
        baseUrl: function() {
            return baseUrl();
        },
        APIUrl: function() {
            return apiUrl();
        },
        currentUrl: function() {
            return currentUrl();
        }
    }
};

/**
 * Axios Default configuration
 * @type String
 */
Axios.defaults.baseURL = baseUrl() + '/api/';
Axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('default_auth_token');
Axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

/**
 * Register global components
 */
Vue.component('AppNavbar', Navbar);

App.router = Vue.router = Router

Vue.mixin(Mixins);

Axios.defaults.baseURL = baseUrl() + '/api/'

Vue.use(VueRouter)
Vue.use(VueAxios, Axios)
Vue.use(VueSession)

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js')
});

new Vue(App).$mount('#app')

