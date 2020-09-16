<template>
	    <div>
	    	<div class="row mx-1">
	    		<router-link to="/store-product" class="btn btn-primary mb-3">Add Product</router-link>
	    	</div>
	    	<br>

	    	<input type="text" v-model="searchTerm" class="form-control" placeholder="Search Here" style="width: 300px;">

	    	<br>
	    	<div class="row">
            <div class="col-lg-12 mb-4 ">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Photo</th>
                        <th>Category</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Root</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in filterSearch" :key="product.id">
                        <td>{{ product.product_name }}</td>
                        <td>{{ product.product_code }}</td>
                        <td><img :src="product.image" id="em_photo"></td>
                        <td>{{ product.category_name }}</td>
                        <td>{{ product.buying_price }}</td>
                        <td>{{ product.selling_price }}</td>
                        <td>{{ product.root }}</td>
                        <td>
                        	<router-link :to="{ name: 'edit-product', params: { id:product.id }}" class="btn btn-sm btn-info" >Edit</router-link>
                        	<a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger" style="color: white;">Delete</a>
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
				products: [],
				searchTerm: ''
			}
		},
		computed:{
			filterSearch(){
				return this.products.filter(product => {
					return product.product_name.match(this.searchTerm)
				})
			}
		},

		methods:{
			allProduct(){
				axios.get('/api/product/')
				.then(({data}) => (this.products = data) )
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
			this.allProduct();
		}

	}
	

</script>

<style>
	#em_photo{
		height: 40px;
		width: 40px;
	}

</style>