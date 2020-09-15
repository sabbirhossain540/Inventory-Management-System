
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;

//Employee
let storeEmployee = require('./components/employee/create.vue').default;
let allemployee = require('./components/employee/index.vue').default;
let editEmployee = require('./components/employee/edit.vue').default;

//End Authentication
let home = require('./components/Home.vue').default;

//Supplier
let storeSupplier = require('./components/supplier/create.vue').default;
let allSupplier = require('./components/supplier/index.vue').default;
let editSupplier = require('./components/supplier/edit.vue').default;



export const routes = [
  { path: '/', component: login, name: '/' },
  { path: '/register', component: register, name:'register' },
  { path: '/logout', component: logout, name:'logout' },

  //Employee Path
  { path: '/store-employee', component: storeEmployee, name:'store-employee' },
  { path: '/allemployee', component: allemployee, name:'allemployee' },
  { path: '/edit-employee/:id', component: editEmployee, name:'edit-employee' },

  //Supplier Path
  { path: '/store-supplier', component: storeSupplier, name:'store-supplier' },
  { path: '/allsupplier', component: allSupplier, name:'allemployee' },
  { path: '/edit-supplier/:id', component: editSupplier, name:'edit-supplier' },


  { path: '/home', component: home, name:'home' }
]