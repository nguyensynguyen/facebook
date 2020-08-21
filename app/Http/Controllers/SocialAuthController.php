<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;
use DB;
class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();

    }
    public function handleProviderCallback()
    {
    	$Socialite=Socialite::driver('facebook')->user();
    	$user=User::where('name',$Socialite->name)->first();
    	if($user){
            Auth::login($user);
            return redirect('admin/home');
    	}
    	else{
    		$add_user=new User;
	        $add_user->name=$Socialite->name;
	        $add_user->email=$Socialite->email;
	        $add_user->password=bcrypt('123456'); 
	        $add_user->save();
            Auth::login($add_user);
            return redirect('admin/home');
    	}
       
	       
     }

     public function redirectToProvidergoogle()
    {
        return Socialite::driver('google')->redirect();

    }
    public function handleProviderCallbackgoogle()
    {
    	$Socialite=Socialite::driver('google')->user();
    	
    	$user=User::where('email',$Socialite->email)->first();
    	if($user){
            Auth::login($user);
           return redirect('admin/home');
    	}
    	else{
    		$add_user=new User;
	        $add_user->name=$Socialite->name;
	        $add_user->email=$Socialite->email;
	        $add_user->password=bcrypt('123456'); 
	        $add_user->save();
            Auth::login($add_user);
            return redirect('admin/home');
    	}
       
	       
     }
     public function homes()
         {
         	return view('home');
         }    
}
