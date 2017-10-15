<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function index()
    {
        return Tutorial::all();
        // return response()->json([
        //     'success'=>true, 
        //     'data'=> Tutorial::all()
        // ]);
    }

    public function show($id)
    {
        //$tutorial = Tutorial::find($id);
        //Eager Loading
        $tutorial = Tutorial::with('comments')->where('id', $id)->first();

        if(!$tutorial) {
            return response()->json(['error' => 'Tutorial not found!'], 404);
        }

        return $tutorial;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required'
        ]);

        $tutorial = $request->user()->tutorials()->create([ 
            'title' => $request->json('title'),
            'slug'  => str_slug($request->json('title'), '-'),
            'body'  => $request->json('body')
        ]);

        return $tutorial;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required'
        ]);

        $tutorial = Tutorial::find($id);
        
        // check ownership tutorial
        if($request->user()->id != $tutorial->user_id) {
            return response()->json(['error' => 'Access Forbidden!'], 403);
        }

        $tutorial->title = $request->title;
        $tutorial->slug = str_slug($request->title, '-');
        $tutorial->body  = $request->body;
        $tutorial->save();

        return $tutorial;

    }

    public function destroy(Request $request, $id)
    {
        $tutorial = Tutorial::find($id);

        if($request->user()->id != $tutorial->user_id) {
            return response()->json(['error' => 'Access Forbidden!'], 403);
        }

        $tutorial->delete();

        return response()->json([
            'success' => true, 
            'message' => 'Successfully deleted data'], 200
        );
    }

}
