<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function testing()
    {
    	return view('testing.test');
    }

    public function testing_detail($id)
    {
    	return view('testing.detail_tutorial', ['id' => $id]);
    }
}
