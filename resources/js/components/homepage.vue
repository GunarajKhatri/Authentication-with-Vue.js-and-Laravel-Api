<template>
<div>	
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item"v-if="!loggedin">
                               <router-link to="/api/public/dashboard" class="nav-link">Dasboard</router-link>  
                            </li>
                            <li class="nav-item"v-if="!loggedin">
                               <router-link to="/api/public/login" class="nav-link">Login</router-link>  
                            </li>
                            
                                <li class="nav-item"v-if="!loggedin">
                                    <router-link to="/api/public/register" class="nav-link">Register</router-link>
                                </li>
                                 <li class="nav-item"v-if="loggedin">
                                    <router-link to="/api/public/logout" class="nav-link">Logout</router-link>
                                </li>
                            
                        
                    </ul>
                </div>
            </div>
        </nav>
</div>
</template>
<script>
    export default {
        computed:{
            loggedin(){
            return this.$store.getters.loggedin;
        }
        }
    }
</script>
