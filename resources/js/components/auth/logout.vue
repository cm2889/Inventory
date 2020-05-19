<template>
</template>

<script type="text/javascript">
 export default { 
  created(){
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    Toast.fire({
          type: 'success',
        icon:'success',
          title: 'Successfully Log Out!'
        })
    this.$router.push({ name: '/' })
  }


}
</script>

<style type="text/css">
	
</style>