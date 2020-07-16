import Login from './components/Login';
import Register from './components/Register';
import logout from './components/logout';
import dashboard from './components/dashboard';
export const routes=[
{
	'path':'/api/public/login',component:Login,meta:{
		requireVisitor:true
	}
},
{
	'path':'/api/public/register',component:Register,meta:{
		requireVisitor:true
	}
},
{
	'path':'/api/public/logout',component:logout
},
{
	'path':'/api/public/dashboard',component:dashboard,meta:{
		requireAuth:true
	}
}

];