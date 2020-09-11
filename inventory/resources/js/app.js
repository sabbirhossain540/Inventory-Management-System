

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Router Import
import {routes} from './routes'


//Import User Class
import User from './Helpers/User'
window.User = User

const router = new VueRouter({
  routes, // short for `routes: routes`
  mode : 'history'
})



const app = new Vue({
    el: '#app',
    router
});
