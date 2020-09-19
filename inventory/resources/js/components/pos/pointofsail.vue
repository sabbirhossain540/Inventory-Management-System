<template>
	    <div>
	    	 <div class="container-fluid" id="container-wrapper">
		          <div class="d-sm-flex align-items-center justify-content-between mb-4">
		            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item"><a href="./">Home</a></li>
		              <li class="breadcrumb-item active" aria-current="page">POS</li>
		            </ol>
		          </div>

		          <div class="row mb-3">

		            <!-- Area Chart -->
		            <div class="col-xl-5 col-lg-5">
		              <div class="card mb-4">
		                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6> 
		                  <a class="btn btn-sm btn-info" ><font color="white">Add Customer</font></a>
		                </div>
		                <div class="card-body">
		                  <div class="chart-area">
							<div class="table-responsive" style="font-size:12px;">
				                  <table class="table align-items-center table-flush">
				                    <thead class="thead-light">
				                      <tr>
				                        <th>Name</th>
				                        <th>Qty</th>
				                        <th>Unit</th>
				                        <th>Total</th>
				                        <th>Action</th>
				                      </tr>
				                    </thead>
				                    <tbody>
				                      <tr v-for="cart in carts" :key="cart.id">
				                        <td>{{ cart.pro_name }}</td>
				                        <td>

				                        	<input type="text" style="width: 15px;" readonly="" :value="cart.pro_quantity">
				                        	<button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>
				                        	<button @click.prevent="decriment(cart.id)" class="btn btn-sm btn-danger" v-if="cart.pro_quantity >= 2">-</button>
				                        	<button class="btn btn-sm btn-danger" v-else="" disabled="">-</button>
				                        </td>
				                        <td>{{ cart.product_price }}</td>
				                        <td>{{ cart.sub_total }}</td>
				                        <td><a @click="removeItem(cart.id)" class="btn btn-sm btn-primary"><font color="white;">X</font></a></td>
				                      </tr>
				                     
				                    </tbody>
				                  </table>
				                </div>

		                  </div>
		                </div>
		                <div class="card-footer">
		                	<ul class="list-group">
		                		<li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity: <strong>{{ qty }}</strong></li>
		                		<li class="list-group-item d-flex justify-content-between align-items-center">Sub Total: <strong>{{ subTotal }}</strong></li>
		                		<li class="list-group-item d-flex justify-content-between align-items-center">Vat: <strong>{{ vats.vat }}%</strong></li>
		                		<li class="list-group-item d-flex justify-content-between align-items-center">Total: <strong>{{ subTotal*vats.vat / 100 + subTotal }} </strong></li>

		                	</ul>
		                	<br>
		                	<form @submit.prevent="ConfirmOrder">
		                		<label>Customer Name</label>
		                		<select class="form-control" v-model="customer_id">
		                			<option :value="customer.id" v-for="customer in customers">{{ customer.name }}</option>
		                		</select>

		                		<label>Pay</label>
		                		<input type="text" class="form-control" required="" v-model="pay">


		                		<label>Due</label>
		                		<input type="text" class="form-control" required="" v-model="due">

		                		<label>Pay By</label>
		                		<select class="form-control" v-model="pay_by">
		                			<option value="HandCash">Hand Cash</option>
		                			<option value="Cheaque">Cheaque</option>
		                			<option value="GiftCard">Gift Card</option>
		                		</select>
		                		<br>
		                		<button type="submit" class="btn btn-success">Submit</button>
		                	</form>
		                </div>
		              </div>
		            </div>
		            <!-- Pie Chart -->
		            <div class="col-xl-7 col-lg-7">
		              <div class="card mb-4">
		                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>

		                </div>
		                <!--Category wise product start -->
		                <ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product</a>
						  </li>

						  <li class="nav-item" role="presentation" v-for="category in categories" :key="category.id">
						    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subProduct(category.id)">{{ category.category_name }}</a>
						  </li>

						</ul>
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  		<div class="card-body">
				                	<input type="text" v-model="searchTerm" class="form-control mb-2" placeholder="Search Here" >
				                	<div class="row">
				                 		<div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filterSearch" :key="product.id">
				                 				<button class="btn btn-sm" @click.prevent="AddToCart(product.id)">
					                 				<div class="card mb-3" style="width: 8.5rem">
					                 					<img :src="product.image" id="em_photo" class="card-img-top">
					                 					<div class="card-body">
					                 						<h6 class="card-title">{{ product.product_name }}</h6>
					                 						<span class="badge badge-success" v-if="product.product_quantity >=1">Available {{product.product_quantity}} </span>
			                        <span class="badge badge-danger" v-else=" ">Stock Out</span>
					                 					</div>
					                 				</div>
				                 				</button>
				                 			</div>
				                 		</div>
				                </div>
						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						  	<div class="card-body">
				                	<input type="text" v-model="searchTerm" class="form-control mb-2" placeholder="Search Here" >
				                	<div class="row">
				                 		<div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproduct in filterSearchByCategory" :key="getproduct.id">
				                 				<a href="#">
					                 				<div class="card mb-3" style="width: 8.5rem">
					                 					<img :src="getproduct.image" id="em_photo" class="card-img-top">
					                 					<div class="card-body">
					                 						<h6 class="card-title">{{ getproduct.product_name }}</h6>
					                 						<span class="badge badge-success" v-if="getproduct.product_quantity >=1">Available {{getproduct.product_quantity}} </span>
			                        <span class="badge badge-danger" v-else=" ">Stock Out</span>
					                 					</div>
					                 				</div>
				                 				</a>
				                 			</div>
				                 		</div>
				                </div>
						  </div>
						</div>

						<!--End Category wise product start -->


		                

		              </div>
		            </div>

		          </div>
		          <!--Row-->

		        </div>
        <!---Container Fluid-->

		</div>

</template>

<script>
	export default {
		//Using Hook method as like construction method
		//User.loggedIn() Method comes from User Helper Class
		created(){
			if(!User.loggedIn()){
				this.$router.push({name: '/'})
			}
		},

		data(){
			return {

				customer_id: '',
				pay: '',
				due: '',
				pay_by: '',

				products: [],
				categories: [],
				getproducts: [],
				searchTerm: '',
				customers:[],
				carts:[],
				vats:'',
			}
		},
		computed:{
			filterSearch(){
				return this.products.filter(product => {
					return product.product_name.match(this.searchTerm)
				})
			},
			filterSearchByCategory(){
				return this.getproducts.filter(getproduct => {
					return getproduct.product_name.match(this.searchTerm)
				})
			},

			qty(){
				let sum = 0;
				for(let i=0; i< this.carts.length; i++){
					sum += (parseFloat(this.carts[i].pro_quantity));
				}
				return sum;
			},

			subTotal(){
				let sum = 0;
				for(let i=0; i< this.carts.length; i++){
					sum += (parseFloat(this.carts[i].pro_quantity) * parseFloat(this.carts[i].product_price));
				}
				return sum;
			},


		},

		methods:{
			allProduct(){
				axios.get('/api/product/')
				.then(({data}) => (this.products = data) )
				.catch()
			},
			allCategory(){
				axios.get('/api/category/')
				.then(({data}) => (this.categories = data) )
				.catch()
			},
			subProduct(id){
				axios.get('/api/getting/product/'+id)
				.then(({data}) => (this.getproducts = data) )
				.catch()
			},
			allCustomer(){
				axios.get('/api/customer/')
				.then(({data}) => (this.customers = data) )
				.catch()
			},

			//Cart Method Start Here
			AddToCart(id){
				axios.get('/api/addToCart/'+id)
				.then(() => {
					Reload.$emit('afterAdd');
					Notification.cart_success()
				} )
				.catch()
			},

			cartProduct(){
				axios.get('/api/getCartProduct/')
				.then(({data}) => (this.carts = data) )
				.catch()
			},

			removeItem(id){
				axios.get('/api/remove/cart/'+id)
				.then(() => {
					Reload.$emit('afterAdd');
					Notification.cart_delete()
				} )
				.catch()
			},

			increment(id){
				axios.get('/api/incriment/'+id)
				.then(() => {
					Reload.$emit('afterAdd');
					Notification.success()
				} )
				.catch()
			},

			decriment(id){
				axios.get('/api/decriment/'+id)
				.then(() => {
					Reload.$emit('afterAdd');
					Notification.success()
				} )
				.catch()
			},

			getVat(){
				axios.get('/api/vats/')
				.then(({data}) => (this.vats = data) )
				.catch()
			},

			ConfirmOrder(){
				let total = this.subTotal*this.vats.vat / 100 + this.subTotal;
				var data = {qty:this.qty, subtotal:this.subTotal, customer_id:this.customer_id, pay_by:this.pay_by, pay:this.pay, due:this.due, vat:this.vats.vat, total:total }

				axios.post('/api/confirmorder/',data)
				.then(() => {
					this.$router.push({ name: 'home'})
					Notification.success();
				})
			
			}


		},



		created(){
			this.allProduct();
			this.allCategory();
			this.allCustomer();
			this.cartProduct();
			
			Reload.$on('afterAdd', () => {
				this.cartProduct();
			});
			this.getVat();
		}

	}
	

</script>

<style scoped>
	#em_photo{
		height: 100px;
		width: 135px;
	}

</style>