
let login=require('./components/auth/login.vue').default;
let register=require('./components/auth/register.vue').default;
let forget=require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
///end authentication------

let home=require('./components/home').default;
 export const routes = [
    { path: '/', component: login,name:'/' },
    { path: '/register', component: register,name:'/register' },
    { path: '/forget', component: forget,name:'/forget' },
     { path: '/logout', component: logout , name:'logout' },
     { path: '/home', component: home , name:'home' }
]