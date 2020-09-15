<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/store-employee" class="btn btn-primary mb-3">Add Employee</router-link>
	    	</div>
	    	<br>

	    	<input type="text" v-model="searchTerm" class="form-control" placeholder="Search Here" style="width: 300px;">

	    	<br>
	    	<div class="row">
            <div class="col-lg-12 mb-4 ">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Sallery</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="employee in filterSearch" :key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td><img :src="employee.photo" id="em_photo"></td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.salary }}</td>
                        <td>{{ employee.joining_date }}</td>
                        <td>
                        	<a href="#" class="btn btn-sm btn-primary">Edit</a>
                        	<a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
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
				employees: [],
				searchTerm: ''
			}
		},
		computed:{
			filterSearch(){
				return this.employees.filter(employee => {
					return employee.name.match(this.searchTerm)
				})
			}
		},

		methods:{
			allEmployee(){
				axios.get('/api/employee/')
				.then(({data}) => (this.employees = data) )
				.catch()
			}
		},

		created(){
			this.allEmployee();
		}

	}
	

</script>

<style>
	#em_photo{
		height: 40px;
		width: 40px;
	}

</style>