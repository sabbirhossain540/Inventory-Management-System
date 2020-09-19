<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/order" class="btn btn-primary">Go Back</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
		                  </div>
		                 	 <div class="row">
		                 	 	<div class="col-lg-6 mb-4">
					              <!-- Simple Tables -->
					              <div class="card">
					                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					                  <h6 class="m-0 font-weight-bold text-primary">Customer Details</h6>
					                </div>
					                <div class="table-responsive">
					                	<ul class="list-group">
										  <li class="list-group-item"><b>Name : </b>{{ orderInfo.name }}</li>
										  <li class="list-group-item"><b>Phone : </b>{{ orderInfo.phone }}</li>
										  <li class="list-group-item"><b>Address : </b>{{ orderInfo.address }}</li>
										  <li class="list-group-item"><b>Date : </b>{{ orderInfo.order_date }}</li>
										  <li class="list-group-item"><b>Pay Through : </b>{{ orderInfo.payby }}</li>
										</ul>
					                 
					                </div>
					                <div class="card-footer"></div>
					              </div>
					            </div>


		                 	 	<div class="col-lg-6 mb-4">
					              <!-- Simple Tables -->
					              <div class="card">
					                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					                  <h6 class="m-0 font-weight-bold text-primary">Calculation Details</h6>
					                </div>
					                <div class="table-responsive">
					                	<ul class="list-group">
										  <li class="list-group-item"><b>Sub Total : </b>{{ orderInfo.sub_total }}</li>
										  <li class="list-group-item"><b>Vat : </b>{{ orderInfo.vat }}%</li>
										  <li class="list-group-item"><b>Total : </b>{{ orderInfo.total }}</li>
										  <li class="list-group-item"><b>Pay Amount : </b>{{ orderInfo.pay }}</li>
										  <li class="list-group-item"><b>Due Amount : </b>{{ orderInfo.due }}</li>
										</ul>
					                 
					                </div>
					                <div class="card-footer"></div>
					              </div>
					            </div>

					            <div class="col-lg-12 mb-4">
					              <!-- Simple Tables -->
					              <div class="card">
					                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					                  <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
					                </div>
					                <div class="table-responsive">
					                  <table class="table align-items-center table-flush">
					                    <thead class="thead-light">
					                      <tr>
					                        <th>Product Name</th>
					                        <th>Product Code</th>
					                        <th>Image</th>
					                        <th>Qty</th>
					                        <th>Unit Price</th>
					                        <th>Total</th>
					                      </tr>
					                    </thead>
					                    <tbody>
					                      <tr v-for="detail in details">
					                        <td>{{ detail.product_name }}</td>
					                        <td>{{ detail.product_code }}</td>
					                        <td><img :src="detail.image" id="em_photo"></td>
					                        <td>{{ detail.pro_quantity }}</td>
					                        <td>{{ detail.pro_price }}</td>
					                        <td>{{ detail.sub_total }}</td>
					                      </tr>
					                    </tbody>
					                  </table>
					                </div>
					                <div class="card-footer"></div>
					              </div>
					            </div>
					          </div>
		                  <div class="text-center">
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
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

			//Retrive Data for edit
			let id = this.$route.params.id
			axios.get('/api/order/details/'+id)
			.then(({data}) => (this.orderInfo = data))


			axios.get('/api/order/orderdetails/'+id)
			.then(({data}) => (this.details = data))
			.catch(console.log(error))




		},

		data(){
			return {
				orderInfo:[],
				details:[]
			}
		}

	}
	

</script>

<style>
	

</style>