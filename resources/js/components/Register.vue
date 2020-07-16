<template>	
<div class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!--  <div class="card-header">Register

           <h5 :class="{'text-success':msg}">{{message}}</h5>
                </div> -->

                <div class="card-body">
                    

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"autofocus v-model="name">
                    <span v-if="this.$store.state.error.username"class="text-danger">{{this.$store.state.error.username[0]}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"v-model="email">
                                <span v-if="this.$store.state.error.email"class="text-danger">{{this.$store.state.error.email[0]}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password"v-model="password">
                                
                                <span v-if="this.$store.state.error.password"class="text-danger">{{this.$store.state.error.password[0]}}</span>
                            </div>
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"@click="submit()">
                                    Register
                                </button>
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
                name:'',
                email:'',
                password:''
            }
        },
        methods:{
            submit(){
                this.$store.dispatch("registeruser",
                        {
                            email:this.email,
                            username:this.name,
                            password:this.password
                        }

                    ).then(response =>{
                            this.$router.push({'path':'/api/public/login'})
                    });

                    
                
            }
        }
        }
</script>