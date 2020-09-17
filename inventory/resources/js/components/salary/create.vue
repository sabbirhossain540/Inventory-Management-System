<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/allSalary" class="btn btn-primary">All Salary</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Add Salary</h1>
		                  </div>
		                  <form class="user" @submit.prevent="productInsert" enctype="multipart/form-data">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                    			<label>Product Name</label>
		                      			<input type="text" class="form-control" id="product_name" v-model="form.product_name">
		                      			<small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                    			<label>Product Code</label>
		                      			<input type="text" class="form-control" id="product_code" v-model="form.product_code">
		                      			<small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                    			<label>Product Category</label>
		                      			<select class="form-control" id="dfdf" v-model="form.category_id">
		                      				<option :value="category.id" v-for="category in categories">{{ category.category_name }}</option>
		                      			</select>
		                    		</div>
		                    		<div class="col-md-6">
		                      			<label>Product Supplier</label>
		                      			<select class="form-control" id="supplier" v-model="form.supplier_id">
		                      				<option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>
		                      			</select>
		                    		</div>
		                    	</div>   
		                    </div>

		                     <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-4">
		                    			<label>Product Root</label>
		                      			<input type="text" class="form-control" id="root" v-model="form.root">
		                      			<small class="text-danger" v-if="errors.root">{{ errors.root[0] }}</small>
		                    		</div>
		                    		<div class="col-md-4">
		                    			<label>Buying Price</label>
		                      			<input type="text" class="form-control" id="buying_price" v-model="form.buying_price">
		                      			<small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</small>
		                    		</div>

		                    		<div class="col-md-4">
		                    			<label>Selling Price</label>
		                      			<input type="text" class="form-control" id="selling_price" v-model="form.selling_price">
		                      			<small class="text-danger" v-if="errors.selling_price">{{ errors.selling_price[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                    			<label>Buying Date</label>
		                      			<input type="date" class="form-control" id="buying_date" v-model="form.buying_date">
		                      			<small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                    			<label>Product Quantity</label>
		                      			<input type="text" class="form-control" id="product_quantity"  v-model="form.product_quantity">
		                      			<small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="file" class="custom-file-input" id="customeFile" @change="onFileSelected">
		                      			<small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
		                      			<label class="custom-file-label" for="customeFile">Choose file</label>
		                    		</div>

		                    		<div class="col-md-6">
		                    			<img :src="form.image" height="40px" width="40px">
		                    		</div>
		                    	</div>   
		                    </div>


		                    <div class="form-group">
		                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
		},

		data(){
			return {
				form:{
					product_name: null,
					product_code: null,
					category_id: null,
					root: null,
					buying_price: null,
					selling_price: null,
					supplier_id: null,
					buying_date: null,
					product_quantity: null,
					image: null
				},

				errors :{

				},
				categories:{},
				suppliers:{},
			}
		},

		methods:{
			productInsert(){
				axios.post('/api/product/',this.form)
				.then(() => {
					this.$router.push({ name: 'allProduct'})
					Notification.success();
				})
				.catch(error => this.errors = error.response.data.errors)
			},

			//For Image Size Check Function
			onFileSelected(event){
				let file = event.target.files[0];
				if(file.size > 1048770){
					Notification.image_validation();
				}else{
					//For Instant Image Show
					let reader = new FileReader();
					reader.onload = event =>{
						this.form.image = event.target.result
						console.log(event.target.result);
					};
					reader.readAsDataURL(file)
				}
			}
		},

		created(){
				axios.get('/api/category/')
				.then(({data}) => (this.categories = data))

				axios.get('/api/supplier/')
				.then(({data}) => (this.suppliers = data))
			}

	}
	

</script>

<style>
	

</style>