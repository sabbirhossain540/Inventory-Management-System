<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/allsupplier" class="btn btn-primary">All Category</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
		                  </div>
		                  <form class="user" @submit.prevent="categoryUpdate" enctype="multipart/form-data">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-12">
		                      			<input type="text" class="form-control" id="category_name" placeholder="Enter your name" v-model="form.category_name">
		                      			<small class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</small>
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

			//Retrive Data for edit
			let id = this.$route.params.id
			axios.get('/api/category/'+id)
			.then(({data}) => (this.form = data))
			.catch(console.log(error))
		},

		data(){
			return {
				form:{
					category_name: ''
				},

				errors :{

				}
			}
		},

		methods:{
			categoryUpdate(){
				let id = this.$route.params.id
				axios.patch('/api/category/'+id,this.form)
				.then(() => {
					this.$router.push({ name: 'allCategory'})
					Notification.success();
				})
				.catch(error => this.errors = error.response.data.errors)
			}
		}

	}
	

</script>

<style>
	

</style>