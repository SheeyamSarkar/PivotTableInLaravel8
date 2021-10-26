<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slug;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $product=Product::with('slugs','tags')->get();

        $slug = Slug::all();
        $tag = Tag::all();
        
        return view ('product',compact('product','slug','tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function addproduct(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            
            'product_name'=> 'required|max:15',
            'product_brand' => 'required|max:15',
            'slug_id' => 'required',
            'tag_id' => 'required',
        ]);
       // dd($request->all());
        $product= Product::create([
            'product_name'=>$request->product_name,
            'product_brand'=>$request->product_brand,
        ]);

        $slug = $request->slug_id;
        $tag = $request->tag_id;

        //dd($slug);
        $product->slugs()->attach($slug);
        $product->tags()->attach($tag);

        $slug = Slug::findOrFail($request->slug_id);
        $tag = Tag::findOrFail($request->tag_id);

        $data=array();
        $data['product_name']=$product->product_name;
        $data['product_brand']=$product->product_brand;
        $data['slug']=$slug->slug;
        $data['tag']=$tag->tag;
        $data['id']=$product->id;
        //dd($data);
        return response()->json([
            'success'=>true,
            'data'=>$data,
        ]);

    }
}
