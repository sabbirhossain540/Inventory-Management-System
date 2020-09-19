<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/order" class="btn btn-primary">Today Order</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Search Order</h1>
		                  </div>
		                  <form class="user" @submit.prevent="searchByDate" enctype="multipart/form-data">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-12">
		                    			<label>Search By Date</label>
		                      			<input type="date" class="form-control" id="date" v-model="search_date" required="">
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                      <button type="submit" class="btn btn-primary btn-block">Search</button>
		                    </div>
		                  </form>
		                  <div class="text-center">
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>


		        <div class="col-lg-12">
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
					                        <th>Qty</th>
					                        <th>Subtotal</th>
					                        <th>Vat</th>
					                        <th>Total</th>
					                        <th>Pay</th>
					                        <th>Due</th>
					                      </tr>
					                    </thead>
					                    <tbody>
					                      <tr v-for="order in orders">
					                        <td>{{ order.name }}</td>
					                        <td>{{ order.qty }}</td>
					                        <td>{{ order.sub_total }}</td>
					                        <td>{{ order.vat }}</td>
					                        <td>{{ order.total }}</td>
					                        <td>{{ order.pay }}</td>
					                        <td>{{ order.due }}</td>
					                      </tr>
					                    </tbody>
					                  </table>
					                </div>
					                <div class="card-footer"></div>
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
		},

		data(){
			return {
					search_date:'',
					orders:{}
					}			
		},


		methods:{
			searchByDate(){
				var datas = {date:this.search_date}
				axios.post('/api/search/order/',datas)
				.then(({data}) => (this.orders = data))
				.catch(console.log(error))

			}
		}

	}
	

</script>

<style>
	

</style>