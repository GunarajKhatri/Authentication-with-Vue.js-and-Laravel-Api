<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login(Request $request){
    	$validator=Validator::make($request->all(),[
    		'email'=>'required|string|max:265',
    		'password'=>'required|string|min:6'
    	]);
    	if($validator->fails()){
    		return response(['errors'=>$validator->errors()],422);
    	}
    	$user=User::where('email',$request->email)->first();
    	if($user){
    		if(Hash::check($request->password,$user->password)){
    				$tokenResult=$user->createToken('Personal Access Token Rosan');
                    $token=$tokenResult->token;
                    $token->save();
                        return response()->json([
                            'access_token'=>$tokenResult->accessToken,
                            'token_type'=>'Bearer'
                          


                    ]);
                     
    				
                    }
                    else{
                $response=["message"=>"Password does not match !"];
                return response($response,422);
            }
    		}
    		
    	else{
    		$response=["message"=>'User does not exist'];
    		return response($response,422);
    	}
    }
    public function logout(){
        auth()->user()->tokens->each(function($token,$key){
            $token->delete();
        });
        return response()->json(
            "Logged out successfully!"
        );
    }
    public function register(Request $request){
        $request->validate([
            'username'=>'required|string',
            'email'=>'required|string|max:265',
            'password'=>'required|string|min:6'
        ]);
        return User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
    }
    
}
