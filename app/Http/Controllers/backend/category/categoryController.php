<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
   /**
    * ---------  index page functionality --------
    **/
    public function index(){
        $all = Category::where('status',1)->get();
        return view('backend.categorys.category.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = Category::get()->count();
        $latestPost = Category::latest()->first();
  
        return view('backend.categorys.category.add',compact('totalpost','latestPost'));
    }

   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= Category::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.categorys.category.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit(){
        return view('backend.categorys.category.edit');
    }

   /**
    * ---------  insert page functionality --------
    **/
    public function insert(Request $request){
        
        /**--- validation code -- */
        $request->validate([
                'category_name'=> 'required',
                
                'category_desc'=> 'required',
            ],[
                'category_name.required'=> 'Category Name is Required !',
                
                'category_desc.required'=> 'Category Description is Required !',
            ]
        );

        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();;
        $creator = Auth::guard('admin')->user()->id;

        // make a custom url 
        $categoryname = strtolower($request->category_name) ;
        $user_input_url  = strtolower($request->custom_url) ;
        if(!empty($user_input_url)){
            $url = Str::slug($user_input_url); // Output: "my-new-category-name"
        }else{
            $url = Str::slug($categoryname); // Output: "my-new-category-name"
        }

        $insert = Category::create([
            'category_name'=>$request->category_name,
            'category_title'=>$request->category_title,
            'category_des'=>$request->category_desc,
            'slug'=>$slug,
            'url'=>$url,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        Seo::create([
            'unique_id'=> $insert->id,
            'model_type'=>'Category',
        ]);





        // insert Successfully 
        if($insert){
            flash()->success('Information Added Successfuly');
        }else{
            flash()->error('Informatin Added Faild !');
        }

        return redirect()->back();

    }





   /**
    * ---------  update page functionality --------
    **/
    public function update(){
       
    }


   /**
    * ---------  soft Delete page functionality --------
    **/
    public function softdelete(){
       
    }

   /**
    * ---------  restore  page functionality --------
    **/
    public function restore(){
       
    }




   /**
    * ---------  restore  page functionality --------
    **/
    public function delete(){
       
    }



   /**
    * ---------  restore  page functionality --------
    **/
    public function public_status(){
       
    }



   /**
    * ---------  restore  page functionality --------
    **/
    public function recycle(){
       
    }

    











}
