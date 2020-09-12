<template>


</template>

<script>
	
export default {
		created(){
			localStorage.removeItem('token')
			localStorage.removeItem('user')

			//Using Sweet Alert
			Toast.fire({
				icon: 'success',
				title: 'Logout Successfully'
			})

			this.$router.push({name: '/'})
		}
	}

</script>

<style>
	

</style>