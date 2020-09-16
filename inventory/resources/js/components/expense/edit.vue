<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/allExpense" class="btn btn-primary">All Expense</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Update Expense</h1>
		                  </div>
		                  <form class="user" @submit.prevent="expenseEdit" enctype="multipart/form-data">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-12">
		                    			<label>Expense Details</label>
		                      			<textarea class="form-control" id="details" v-model="form.details" cols="5" rows="5"></textarea>
		                      			<small class="text-danger" v-if="errors.details">{{ errors.details[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-12">
		                    			<label>Expense Amount</label>
		                      			<input type="text" class="form-control" id="amount"  v-model="form.amount">
		                      			<small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
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
			axios.get('/api/expense/'+id)
			.then(({data}) => (this.form = data))
			.catch(console.log(error))
		},

		data(){
			return {
				form:{
					details: '',
					amount: '',
				},

				errors :{

				}
			}
		},

		methods:{
			expenseEdit(){
				let id = this.$route.params.id
				axios.patch('/api/expense/'+id,this.form)
				.then(() => {
					this.$router.push({ name: 'allExpense'})
					Notification.success();
				})
				.catch(error => this.errors = error.response.data.errors)
			}
		}

	}
	

</script>

<style>
	

</style>