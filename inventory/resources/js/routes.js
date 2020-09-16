
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

//Category Route
let storeCategory = require('./components/category/create.vue').default;
let allCategory = require('./components/category/index.vue').default;
let editCategory = require('./components/category/edit.vue').default;

//Product Route
let storeProduct = require('./components/product/create.vue').default;
let allProduct = require('./components/product/index.vue').default;
let editProduct= require('./components/product/edit.vue').default;



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

  //Category Path
  { path: '/store-category', component: storeCategory, name:'store-category' },
  { path: '/allcategory', component: allCategory, name:'allCategory' },
  { path: '/edit-category/:id', component: editCategory, name:'edit-category' },

  //Product Path
  { path: '/store-product', component: storeProduct, name:'store-product' },
  { path: '/allproduct', component: allProduct, name:'allProduct' },
  { path: '/edit-product/:id', component: editProduct, name:'edit-product' },




  { path: '/home', component: home, name:'home' }
]