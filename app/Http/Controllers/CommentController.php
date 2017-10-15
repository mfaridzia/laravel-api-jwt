<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
        	'body' => 'required' 
        ]);

        $comment = $request->user()->comments()->create([ 
            'body'        => $request->json('body'),
            'tutorial_id' => $id,
        ]);

        return $comment;
    }

 }
