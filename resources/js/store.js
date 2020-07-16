export default{
	state:{
		token:localStorage.getItem('access_token') || null,
		error:{}
	},
	getters:{
		loggedin(state){
			return state.token!=null;
		}
	},
	actions:{
		// in my case my base url is localhost/api/public so as per your
		//base url you can edit in axios part:)
		logout(context){

			axios.defaults.headers.common['Authorization']='Bearer ' + context.state.token
			if(context.getters.loggedin){
				return new Promise((resolve,reject)=>{
			axios.post('/api/public/api/logout').then((response)=>{
	   context.commit('destroyToken')
	   resolve(response)
	  
	  })
	  .catch((error)=>
	  	{
	  		context.commit('destroyToken')
	  		reject(error)
	  	})
	  })
		}
		},

		authenticateuser(context,payload){
			return new Promise((resolve,reject)=>{
			axios.post('/api/public/api/login',{email:payload.email,password:payload.password}).then((response)=>{
	   context.commit('setToken',response.data)
	   resolve(response)
	  
	  })
	  .catch((error)=>
	  	{
	  		context.commit('errorr',error)
	  		reject(error)
	  	})
	  })
		},
		registeruser(context,payload){
		return new Promise((resolve,reject)=>{
			axios.post('/api/public/api/register',{username:payload.username,email:payload.email,password:payload.password}).then((response)=>{
	   resolve(response)
	  
	  })
	  .catch((error)=>
	  	{
	  		context.commit('errorr',error.response.data.errors)
	  		reject(error)
	  	})
	  })	
		}
		
   },
	
	mutations:{
		setToken(state,payload){
			localStorage.setItem('access_token',payload.access_token)
			state.token=payload.access_token
		},
		errorr(state,payload){
			state.error=payload
		},
		destroyToken(state){
			localStorage.removeItem('access_token')
			state.token=null
		}


	}

}
