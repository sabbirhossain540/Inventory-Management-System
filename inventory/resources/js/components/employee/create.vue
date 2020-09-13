<template>
	    <div>
	    	<div class="row">
	    		<router-link to="" class="btn btn-primary">All Employee</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
		                  </div>
		                  <form class="user" @submit.prevent="signup">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="name" placeholder="Enter your name" v-model="form.name">
		                    		</div>
		                    		<div class="col-md-6">
		                      			<input type="email" class="form-control" id="email" placeholder="Enter your email" v-model="form.email">
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="address" placeholder="Enter your Address" v-model="form.address">
		                    		</div>
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="salary" placeholder="Enter your Salary" v-model="form.salary">
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="date" class="form-control" id="joining_date" placeholder="Enter your Joining Date" v-model="form.joining_date">
		                    		</div>
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="nid" placeholder="Enter your NID no" v-model="form.nid">
		                    		</div>
		                    	</div>   
		                    </div>

		                     <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="text" class="form-control" id="phone" placeholder="Enter your phone no" v-model="form.phone">
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                      			<input type="file" class="custom-file-input" id="customeFile">
		                      			<label class="custom-file-label" for="customeFile">Choose file</label>
		                    		</div>

		                    		<div class="col-md-6">
		                    			<img src="form.photo" height="40px" width="40px">
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
					password: null,
					password_confirmation: null,
				},

				errors :{

				}
			}
		},

	}
	

</script>

<style>
	

</style>