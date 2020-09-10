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
		                  <form>
		                    <div class="form-group">
		                      <label>Fullname</label>
		                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname">
		                    </div>
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
		                        placeholder="Enter Email Address">
		                    </div>
		                    <div class="form-group">
		                      <label>Password</label>
		                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		                    </div>
		                    <div class="form-group">
		                      <label>Repeat Password</label>
		                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
		                        placeholder="Repeat Password">
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
	

</script>

<style>
	

</style>