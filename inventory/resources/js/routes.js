
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;

//End Authentication
let home = require('./components/Home.vue').default;



export const routes = [
  { path: '/', component: login, name: '/' },
  { path: '/register', component: register, name:'register' },
  { path: '/logout', component: logout, name:'logout' },

  { path: '/home', component: home, name:'home' }
]