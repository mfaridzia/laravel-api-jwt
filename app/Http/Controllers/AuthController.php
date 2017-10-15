<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// package jwt auth
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
    	$request->validate([
    		'username' => 'required|unique:users|max:100',
    		'email'    => 'required|unique:users|max:100',
    		'password' => 'required'
    	]);

    	return User::create([
    		'username' => $request->json('username'),
    		'email'    => $request->json('email'),
    		'password' => bcrypt($request->json('password'))
    	]);
    }

    public function sigin(Request $request)
    {
    	$request->validate([
    		'username' => 'required', 
    		'password' => 'required'
    	]);

    	/*
			Creating Tokens
    	*/
    	// grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json([
        	'user_id' => $request->user()->id,
        	'token'   => $token
        ]);

    }

}
