
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//router imported
import {routes} from './routes';
window.Vue = require('vue');

//import user class
import User from './Helpers/User';
window.User = User

// Reload
window.Reload = new Vue();

//import Notification class
import Notification from './Helpers/Notification';
window.Notification = Notification


//sweet alert start
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;
//sweet alert end

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});
