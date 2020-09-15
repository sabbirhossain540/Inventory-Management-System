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
                        	<router-link :to="{ name: 'edit-employee', params: { id:employee.id }}" class="btn btn-sm btn-info" >Edit</router-link>
                        	<a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger" style="color: white;">Delete</a>
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
			},

			deleteEmployee(id){
				Swal.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	axios.delete('/api/employee/'+id)
				  	.then(() => {
				  		this.employees = this.employees.filter(employee => {
				  			return employee.id != id
				  		})
				  	})
				  	.catch(() => {
				  		this.$router.push({name: 'allemployee'})
				  	})
				    Swal.fire(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})
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