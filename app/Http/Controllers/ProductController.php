<?php

namespace App\Http\Controllers;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    
    public function createProduct(Request $request){
 /*
  * {"name": "jacket",
        "category": "cat1",
        "subcategory": "CAT2",
        "value": 200,
        "collection_id": 7}
  */
        $product = Product::create($request->all()); // insert product
        
        $tags = $request->input('tags');
        foreach ($tags as $tagName)
        {
             $tag = DB::table('Tag')->where('name', $tagName)->first();
             $tagID=0;
             if(!$tag) // the tag is not already inserted before then insert it
             {  
               $tagID = DB::table('Tag')->insertGetId(['name' => $tagName]);
                 }
                else 
                   $tagID= $tag->tag_id;
                
                //inserting product tags
                DB::table('product_tag')->insert(['product_id' => $product->id,'tag_id'=> $tagID]);
               
        }
        
        $collectionID = $request->input('collection_id');
         $collection = DB::table('Collection')->where('id', $collectionID)->first();
               if(!$collection) // the tag is not already inserted before then insert it
             {  
             DB::table('Collection')->insert(['id'=>$collectionID,'name' => "collection".$collectionID]);
                 }
    	return response()->json($product);
 
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }
//        $id = DB::table('users')->insertGetId(
//        ['email' => 'john@example.com', 'votes' => 0]
//        );
        
    
    
    public function displayAll(){
 
    	$product  = Product::all();
    	return response()->json($product);
 
 
	}
    //
}
