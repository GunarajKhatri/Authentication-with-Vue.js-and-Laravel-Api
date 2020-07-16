<template>	
<div class="container"style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                   
                       

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email password</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required autofocus>
                                 

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"v-model="password" required >
                                

                                
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"@click="submit()">
                                    Login
                                </button>

                                
                                    <a class="btn btn-link" href="#">
                                        Forget your password
                                    </a>
                                
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
        data(){
            return{
                email:'',
                password:''
            }
        },
        methods:{
            submit(){
                this.$store.dispatch("authenticateuser",
                        {
                            email:this.email,
                            password:this.password
                        }

                    ).then(response =>{
                            this.$router.push({'path':'/api/public/dashboard'})
                    });

                    
                
            }
        }
    }
</script>
