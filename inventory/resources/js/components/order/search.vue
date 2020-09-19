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
		                      			<input type="date" class="form-control" id="date" v-model="date" required="">
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
					date: '',
					orders: []
				},
			}
		},

		methods:{
			searchByDate(){
				var data = {date:this.date}
				axios.get('/api/order/searchByDate/',data)
				.then(({data}) => (this.orders = data))
				.catch(console.log(error))

			}
		}

	}
	

</script>

<style>
	

</style>