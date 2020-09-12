<template>
	    <div>
		    <div class="row justify-content-center">
		      <div class="col-xl-10 col-lg-12 col-md-9">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
		                  </div>
		                  <form class="user" @submit.prevent="signup">
		                    <div class="form-group">
		                      <label>Fullname</label>
		                      <input type="text" class="form-control" id="name" placeholder="Enter Fullname" v-model="form.name">
		                    </div>
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email" class="form-control" id="email"  aria-describedby="emailHelp"
		                        placeholder="Enter Email Address" v-model="form.email">
		                    </div>
		                    <div class="form-group">
		                      <label>Password</label>
		                      <input type="password" class="form-control" id="password"  placeholder="Password" v-model="form.password">
		                    </div>
		                    <div class="form-group">
		                      <label>Repeat Password</label>
		                      <input type="password" class="form-control" id="password_confirmation" placeholder="Repeat Password" v-model="form.password_confirmation">
		                    </div>
		                    <div class="form-group">
		                      <button type="submit" class="btn btn-primary btn-block">Register</button>
		                    </div>
		                  </form>
		                  <hr>
		                  <div class="text-center">
		                  	<router-link to="/">Already have an account?</router-link>
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
			if(User.loggedIn()){
				this.$router.push({name: 'home'})
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

		methods: {
			signup(){
				 axios.post('/api/auth/signup',this.form)
				 .then(res => {
				 	User.responseAfterLogin(res)

				 	//Using Sweet Alert
				 	Toast.fire({
					  icon: 'success',
					  title: 'Signed in successfully'
					})

				 	this.$router.push({name: 'home'})
				 })
				 .catch(//error => console.log(error.response.data)
				 	error => this.errors = error.response.data.errors
				 	)

			}
		}
	}
	

</script>

<style>
	

</style>