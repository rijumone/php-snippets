<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller {

	public function googleLogin(Request $request)  {

		$google_redirect_url = route('glogin');
		$gClient = new \Google_Client();
		$gClient->setApplicationName(config('services.google.app_name'));
		$gClient->setClientId(config('services.google.client_id'));
		
		$gClient->setClientSecret(config('services.google.client_secret'));
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey(config('services.google.api_key'));
		$gClient->setScopes(array(
			'https://www.googleapis.com/auth/plus.me',
			'https://www.googleapis.com/auth/userinfo.email',
			'https://www.googleapis.com/auth/userinfo.profile',
			));
		$google_oauthV2 = new \Google_Service_Oauth2($gClient);
		if ($request->get('code')){
			$gClient->authenticate($request->get('code'));
			$request->session()->put('token', $gClient->getAccessToken());
		}
		if ($request->session()->get('token'))
		{
			$gClient->setAccessToken($request->session()->get('token'));
		}
		if ($gClient->getAccessToken())
		{
                //For logged in user, get details from google using access token
			$guser = $google_oauthV2->userinfo->get();  

			$request->session()->put('name', $guser['name']);
			if ($user =User::where('email',$guser['email'])->first())
			{ //dd($user);
                        //logged your user via auth login
			}else{ echo "register"; dd($guser);
                        //register your user with response data
			}               
			return redirect()->route('user.glist');          
		} else
		{
                //For Guest user, get google login url
			$authUrl = $gClient->createAuthUrl();
			return redirect()->to($authUrl);
		}
	}
	public function listGoogleUser(Request $request){
		$users = User::orderBy('id','DESC')->paginate(5);
		return view('users.list',compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);;
	}
}
