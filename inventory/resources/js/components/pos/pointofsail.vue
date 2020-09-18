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
		                  <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6> 
		                </div>
		                <div class="card-body">
		                  <div class="chart-area">
							sdvsdv

		                  </div>
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
						  <li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
						  </li>

						</ul>
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  		<div class="card-body">
				                	<input type="text" v-model="searchTerm" class="form-control mb-2" placeholder="Search Here" >
				                	<div class="row">
				                 		<div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filterSearch" :key="product.id">
				                 				<a href="#">
					                 				<div class="card mb-3" style="width: 8.5rem">
					                 					<img :src="product.image" id="em_photo" class="card-img-top">
					                 					<div class="card-body">
					                 						<h6 class="card-title">{{ product.product_name }}</h6>
					                 						<span class="badge badge-success" v-if="product.product_quantity >=1">Available {{product.product_quantity}} </span>
			                        <span class="badge badge-danger" v-else=" ">Stock Out</span>
					                 					</div>
					                 				</div>
				                 				</a>
				                 			</div>
				                 		</div>
				                </div>
						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
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
				products: [],
				searchTerm: ''
			}
		},
		computed:{
			filterSearch(){
				return this.products.filter(product => {
					return product.product_name.match(this.searchTerm)
				})
			}
		},

		methods:{
			allProduct(){
				axios.get('/api/product/')
				.then(({data}) => (this.products = data) )
				.catch()
			}
		},

		created(){
			this.allProduct();
		}

	}
	

</script>

<style scoped>
	#em_photo{
		height: 100px;
		width: 135px;
	}

</style>