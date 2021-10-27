<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slug;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\ProductSlug;
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
        //dd($product);
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

    public function viewproduct(Request $request)
    {
        $data = Product::find($request->id);
        $slug = $data->slugs->first();
        $tag  = $data->tags->first();
        $data['slug'] = $slug->slug;
        $data['tag'] = $tag->tag;

        if ($data) {
            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data'    => 'No information found',
            ]);
        }
    }

    public function editproduct(Request $request)
    {

        $data = Product::with('slugs', 'tags')->find($request->id);
        //dd($data);
        if ($data) {
            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data'    => 'No information found',
            ]);
        }
    }

    public function updateproduct(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            
            'product_name2'=> 'required|max:15',
            'product_brand2' => 'required|max:15',
            'slug_id2' => 'required',
            'tag_id2' => 'required',
        ]);
        //dd($request->all());
        if ($validator->fails()) {
            $data          = array();
            $data['error'] = $validator->errors()->all();
            return response()->json([
                'success' => false,
                'data'    => $data,
            ]);
        } 
        else {

            //dd($request->all());

            //$product = Product::findOrFail($request->hidden_id);
            $product = Product::find($request->id);
            
            $product->update([
                'product_name'=>$request->product_name2,
                'product_brand'=>$request->product_brand2,
                
            ]);

            $slug = $request->slug_id2;
            $tag = $request->tag_id2;

            //dd($request->all());

            //dd($slug);
            $product->slugs()->sync($slug);
            $product->tags()->sync($tag);
            
            $slugs=[];
            foreach($product->slugs as $slug_val){
                $slugs=$slug_val->slug;

            }
            $tags=[];
            foreach($product->tags as $tag_val){
                $tags=$tag_val->tag;

            }

            $data=array();
            $data['product_name']=$product->product_name;
            $data['product_brand']=$product->product_brand;
            $data['slug']=$slugs;
            $data['tag']=$tags;

            
            // dd($tags);

            $data['id']=$request->id;
            //dd($request->all());
            return response()->json([
                'success'=>true,
                'data'=>$data,
            ]);
        }
    }

    public function deleteproduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($product) {
            $product->delete();

            $slug = $request->slug_id2;
            $tag = $request->tag_id2;

            $product->slugs()->detach($slug);
            $product->tags()->detach($tag);
            $data            = array();
            $data['message'] = 'Product deleted successfully';
            $data['id']      = $request->id;
            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } else {
            $data            = array();
            $data['message'] = 'Product can not deleted!';
            return response()->json([
                'success' => false,
                'data'    => $data,
            ]);
        }
    }
}
