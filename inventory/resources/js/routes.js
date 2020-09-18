
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

//Customer
let storeCustomer = require('./components/customer/create.vue').default;
let allCustomer = require('./components/customer/index.vue').default;
let editCustomer = require('./components/customer/edit.vue').default;

//Category Route
let storeCategory = require('./components/category/create.vue').default;
let allCategory = require('./components/category/index.vue').default;
let editCategory = require('./components/category/edit.vue').default;

//Product Route
let storeProduct = require('./components/product/create.vue').default;
let allProduct = require('./components/product/index.vue').default;
let editProduct= require('./components/product/edit.vue').default;

//Expense Route
let storeExpense = require('./components/expense/create.vue').default;
let allExpense = require('./components/expense/index.vue').default;
let editExpense= require('./components/expense/edit.vue').default;

//Salary Route
let paysalary = require('./components/salary/create.vue').default;
let salary = require('./components/salary/all_employee.vue').default;
let allsalary = require('./components/salary/index.vue').default;
let viewSalary = require('./components/salary/viewSalary.vue').default;
let editSalary = require('./components/salary/edit.vue').default;

//Stock Route
let stock = require('./components/product/stock.vue').default;
let editStock = require('./components/product/editStock.vue').default;

//Pos Route
let pos = require('./components/pos/pointofsail.vue').default;


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

  //Customer Path
  { path: '/store-customer', component: storeCustomer, name:'store-customer' },
  { path: '/allcustomer', component: allCustomer, name:'allcustomer' },
  { path: '/edit-customer/:id', component: editCustomer, name:'edit-customer' },

  //Category Path
  { path: '/store-category', component: storeCategory, name:'store-category' },
  { path: '/allcategory', component: allCategory, name:'allCategory' },
  { path: '/edit-category/:id', component: editCategory, name:'edit-category' },

  //Product Path
  { path: '/store-product', component: storeProduct, name:'store-product' },
  { path: '/allproduct', component: allProduct, name:'allProduct' },
  { path: '/edit-product/:id', component: editProduct, name:'edit-product' },

  //Expense Path
  { path: '/store-expense', component: storeExpense, name:'store-expense' },
  { path: '/allexpense', component: allExpense, name:'allExpense' },
  { path: '/edit-expense/:id', component: editExpense, name:'edit-expense' },

  //Salary Path
  { path: '/pay-salary/:id', component: paysalary, name:'pay-salary' },
  { path: '/salary', component: salary, name:'salary' },
  { path: '/allsalary', component: allsalary, name:'allsalary' },
  { path: '/view-salary/:id', component: viewSalary, name:'view-salary' },
  { path: '/salary-edit/:id', component: editSalary, name:'salary-edit' },

  //Stock Path
  { path: '/stock', component: stock, name:'stock' },
  { path: '/edit-stock', component: editStock, name:'edit-stock' },

  //Pos Path
  { path: '/pos', component: pos, name:'pos' },




  { path: '/home', component: home, name:'home' }
]