<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	// profile page
    public function profile(Request $request)
    {
    	// return all user data
    	return $request->user();
    }
}
