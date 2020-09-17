<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/allemployee" class="btn btn-primary">All Employee</router-link>
	    	</div>
		    <div class="row justify-content-center">
		      <div class="col-xl-12 col-lg-12 col-md-12">
		        <div class="card shadow-sm my-5">
		          <div class="card-body p-0">
		            <div class="row">
		              <div class="col-lg-12">
		                <div class="login-form">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Pay Salary</h1>
		                  </div>
		                  <form class="user" @submit.prevent="employeeUpdate">

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                    			<label>Name</label>
		                      			<input type="text" class="form-control" id="name" v-model="form.name">
		                      			<small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                    			<label>Email</label>
		                      			<input type="email" class="form-control" id="email" v-model="form.email">
		                      			<small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                    	<div class="form-row">
		                    		<div class="col-md-6">
		                    			<label>Months</label>
		                      			<select class="form-control" id="dfdf" v-model="form.salary_month">
		                      				<option value="January">January</option>
		                      				<option value="February">February</option>
		                      				<option value="March">March</option>
		                      				<option value="April">April</option>
		                      				<option value="May">May</option>
		                      				<option value="June">June</option>
		                      				<option value="July">July</option>
		                      				<option value="August">August</option>
		                      				<option value="September">September</option>
		                      				<option value="October">October</option>
		                      				<option value="November">November</option>
		                      				<option value="December">December</option>
		                      			</select>
		                      			<small class="text-danger" v-if="errors.salary_month">{{ errors.salary_month[0] }}</small>
		                    		</div>
		                    		<div class="col-md-6">
		                    			<label>Amount</label>
		                      			<input type="text" class="form-control" id="salary" v-model="form.salary">
		                      			<small class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
		                    		</div>
		                    	</div>   
		                    </div>

		                    <div class="form-group">
		                      <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
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
			axios.get('/api/employee/'+id)
			.then(({data}) => (this.form = data))
			.catch(console.log(error))
		},

		data(){
			return {
				form:{
					name: '',
					email: '',
					address: '',
					salary: '',
					joining_date: '',
					nid: '',
					phone: '',
					photo: '',
					newphoto: ''
				},

				errors :{

				}
			}
		},

		methods:{
			employeeUpdate(){
				let id = this.$route.params.id
				axios.patch('/api/employee/'+id,this.form)
				.then(() => {
					this.$router.push({ name: 'allemployee'})
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
					};
					reader.readAsDataURL(file)
				}
			}
		}

	}
	

</script>

<style>
	

</style>