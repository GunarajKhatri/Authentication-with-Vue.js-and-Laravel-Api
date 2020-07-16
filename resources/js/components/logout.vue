<template>	
	
</template>
<script>
    export default {
        mounted() {
            this.$store.dispatch('logout').then(response =>{
                            this.$router.push({'path':'/api/public/login'})
                    });
        }
    }
</script>
