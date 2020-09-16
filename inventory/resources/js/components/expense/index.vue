<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/store-expense" class="btn btn-primary mb-3">Add Expense</router-link>
	    	</div>
	    	<br>

	    	<input type="text" v-model="searchTerm" class="form-control" placeholder="Search Here" style="width: 300px;">

	    	<br>
	    	<div class="row">
            <div class="col-lg-12 mb-4 ">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="expense in filterSearch" :key="expense.id">
                        <td>{{ expense.details }}</td>
                        <td>{{ expense.amount }}</td>
                        <td>{{ expense.expanse_date }}</td>
                        <td>
                        	<router-link :to="{ name: 'edit-expense', params: { id:expense.id }}" class="btn btn-sm btn-info" >Edit</router-link>
                        	<a @click="deleteExpanse(expense.id)" class="btn btn-sm btn-danger" style="color: white;">Delete</a>
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
				expenses: [],
				searchTerm: ''
			}
		},
		computed:{
			filterSearch(){
				return this.expenses.filter(expense => {
					return expense.details.match(this.searchTerm)
				})
			}
		},

		methods:{
			allExpense(){
				axios.get('/api/expense/')
				.then(({data}) => (this.expenses = data) )
				.catch()
			},

			deleteProduct(id){
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
				  	axios.delete('/api/product/'+id)
				  	.then(() => {
				  		this.products = this.products.filter(product => {
				  			return product.id != id
				  		})
				  	})
				  	.catch(() => {
				  		this.$router.push({name: 'allProduct'})
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
			this.allExpense();
		}

	}
	

</script>

<style>
	#em_photo{
		height: 40px;
		width: 40px;
	}

</style>