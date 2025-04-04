<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Seo_image;
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
        $data= Category::with(['metaData'=>function($query){
            $query->where('model_type','Category'); // metaData filter   
        },
        'metaData.images' // ✅ nested eager load (Seo -> Seo_image
        ])->where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
       //dd($data);
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




       $metadat = Seo::create([
            // defualt
            'unique_id'=> $insert->id,
            'model_type'=>'Category',
            // genrel feilds 
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'meta_robots'=>$request->meta_robots,
            'canonical_url'=>$request->canonical_url,
            'hreflang_tags' => json_encode($request->hreflang_tags, JSON_UNESCAPED_UNICODE),
            'structured_data' => json_encode($request->structured_data, JSON_UNESCAPED_UNICODE),
            // open graph 
            'og_title'=>$request->og_title,
            'og_description'=>$request->og_description,
            'og_url'=>$request->og_url,
            'og_type'=>$request->og_type,
            'og_locale'=>$request->og_locale,
            // twitter card
            'twitter_card'=>$request->twitter_card,
            'twitter_title'=>$request->twitter_title,
            'twitter_description'=>$request->twitter_description,
            'twitter_site'=>$request->twitter_site,
            // whatsapp 
            'whatsapp_title'=>$request->whatsapp_title,
            'whatsapp_description'=>$request->whatsapp_description,
            // pinterest
            'pinterest_description'=>$request->pinterest_description,
            'pinterest_rich_pin'=>$request->pinterest_rich_pin,
            // image
            'seo_image'=>'seo_image',

            'slug'=>$slug,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

      // uploads image for seo 
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/seo', $fileName, 'public');

                Seo_image::create([
                    'seo_id'     => $metadat->id,
                    'model_type' => 'Seo',
                    'image_name' => $fileName, // ✅ এখানে ভ্যারিয়েবল ব্যবহার করা হয়েছে সঠিকভাবে
                ]);
            }
        }

      

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
