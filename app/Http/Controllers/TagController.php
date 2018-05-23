<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Http\Controllers\Controller;
use vendor\illuminate\http\Request;


class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    
    public function displayAll(){
 
    	$tag = Tag::all();
    	return response()->json($tag);
 
	}
    //
}
