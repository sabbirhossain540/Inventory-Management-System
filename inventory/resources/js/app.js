

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Router Import
import {routes} from './routes'


//Import User Class globally
import User from './Helpers/User'
window.User = User

//Import Noty Notification globally
import Notification from './Helpers/Notification'
window.Notification = Notification

//Using Sweetalert
//first install sweet alert using npm
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

//End Using Sweet alert part


const router = new VueRouter({
  routes, // short for `routes: routes`
  mode : 'history'
})



const app = new Vue({
    el: '#app',
    router
});
