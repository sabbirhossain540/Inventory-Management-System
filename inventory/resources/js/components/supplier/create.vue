<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/allsupplier" class="btn btn-primary">All Supplier</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Add Supplier</h1>
		                  </div>
		                  <form class="user" @submit.prevent="supplierInsert" enctype="multipart/form-data">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="name" placeholder="Enter your name" v-model="form.name">
		                      			<small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                      			<input type="email" class="form-control" id="email" placeholder="Enter your email" v-model="form.email">
		                      			<small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="address" placeholder="Enter your Address" v-model="form.address">
		                      			<small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="phone" placeholder="Enter your Phone no" v-model="form.phone">
		                      			<small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                     <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="shopname" placeholder="Enter your Shop name" v-model="form.shopname">
		                      			<small class="text-danger" v-if="errors.shopname">{{ errors.shopname[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="file" class="custom-file-input" id="customeFile" @change="onFileSelected">
		                      			<small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
		                      			<label class="custom-file-label" for="customeFile">Choose file</label>
		                    		</div>

		                    		<div class="col-md-6">
		                    			<img :src="form.photo" height="40px" width="40px">
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
					name: null,
					email: null,
					address: null,
					phone: null,
					shopname: null,
					photo: null
				},

				errors :{

				}
			}
		},

		methods:{
			supplierInsert(){
				axios.post('/api/supplier/',this.form)
				.then(() => {
					this.$router.push({ name: 'allsupplier'})
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
						this.form.photo = event.target.result
						console.log(event.target.result);
					};
					reader.readAsDataURL(file)
				}
			}
		}

	}
	

</script>

<style>
	

</style>