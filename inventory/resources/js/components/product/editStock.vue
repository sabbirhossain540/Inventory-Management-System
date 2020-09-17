<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/stock" class="btn btn-primary">Go Back</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Update Stock</h1>
		                  </div>
		                  <form class="user" @submit.prevent="productEdit" enctype="multipart/form-data">

	

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-12">
		                    			<label>Stock Quantity</label>
		                      			<input type="text" class="form-control" id="product_quantity"  v-model="form.product_quantity">
		                      			<small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>


		                    <div class="form-group">
		                      <button type="submit" class="btn btn-primary btn-block">Update</button>
		                    </div>
		                  </form>
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
			axios.get('/api/product/'+id)
			.then(({data}) => (this.form = data))
			.catch(console.log(error))




		},

		data(){
			return {
				form:{
					product_quantity: '',
				},

				errors :{

				},

			}
		},

		methods:{
			productEdit(){
				let id = this.$route.params.id
				axios.patch('/api/product/'+id,this.form)
				.then(() => {
					this.$router.push({ name: 'stock'})
					Notification.success();
				})
				.catch(error => this.errors = error.response.data.errors)
			},

		}

	}
	

</script>

<style>
	

</style>