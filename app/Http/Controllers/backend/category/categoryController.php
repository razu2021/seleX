<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Seo;
use App\Models\Seo_image;

class categoryController extends Controller
{
   /**
    * ---------  index page functionality --------
    **/
    public function index(Request $request){

        $search = $request->search ;

        $all = Category::where('status',1)->where('category_name','LIKE',"%$search%")->get();
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
    public function edit($id,$slug){
        $totalpost  = Category::get()->count();
        $latestPost = Category::latest()->first();
        $data= Category::with(['metaData'=>function($query){
            $query->where('model_type','Category'); // metaData filter   
        },
        'metaData.images' // ✅ nested eager load (Seo -> Seo_image
        ])->where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.categorys.category.edit',compact('totalpost','latestPost','data'));
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
    public function update(Request $request){
               /**--- validation code -- */
            $request->validate([
            'category_name'=> 'required',
            
            'category_desc'=> 'required',
        ],[
            'category_name.required'=> 'Category Name is Required !',
            
            'category_desc.required'=> 'Category Description is Required !',
        ]
    );


    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;


    // make a custom url 
    $categoryname = strtolower($request->category_name) ;
    $user_input_url  = strtolower($request->custom_url) ;
    if(!empty($user_input_url)){
        $url = Str::slug($user_input_url); // Output: "my-new-category-name"
    }else{
        $url = Str::slug($categoryname); // Output: "my-new-category-name"
    }


    //category update 
    $update = Category::where('id',$id)->where('slug',$slug)->update([
        'category_name'=>$request->category_name,
        'category_title'=>$request->category_title,
        'category_des'=>$request->category_desc,
        'slug'=>$slug,
        'url'=>$url,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    
    
    // update metaData ------------
    $update_metaData = Seo::where('unique_id',$id)->where('slug',$slug)->update([
        // defualt
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

        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);




 

    // -----update seo image ------
    $seoId = Seo::where('unique_id', $id)->where('slug', $slug)->first(); 
    if ($seoId) {
        $seoId = $seoId->id;  // seoId পাওয়ার পর, সেটা সেভ করবো
    } else {
        return back()->withErrors('No SEO data found for this ID'); // যদি SEO data না পাওয়া যায়, তাহলে ত্রুটি দেখানো হবে
    }



    if($request->hasFile('images')){
        $images = $request->file('images');
        foreach($images as $key => $file){
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/seo', $fileName, 'public');

            // ফর্ম থেকে unique_id এবং seo_id গুলি আনার জন্য
            $table_ids = $request->input('table_ids');  // এটা হবে table_ids এর array
            $seo_ids = $request->input('seo_ids');  // এটা হবে seo_ids এর array
            if($table_ids &&  $seo_ids){

            // প্রতিটি ছবির জন্য seo_id এবং table_id বের করা
            $seo_id = isset($seo_ids[$key]) ? $seo_ids[$key] : null;
            $table_id = isset($table_ids[$key]) ? $table_ids[$key] : null;


            /**--------- Multiple file delete when you update new file ----------- */
            $old_files =  Seo_image::where('id',$table_id)->where('seo_id',$seo_id)->get();

            foreach ($old_files as $old_file) {
                $file_path = public_path('storage/uploads/seo/'.$old_file->image_name);
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
            }

            /**---------- multiple file delete ---------- */


              Seo_image::where('id',$table_id)->where('seo_id',$seo_id)->update([
                'image_name' =>$fileName,
              ]);


            }else{
                Seo_image::create([
                    'seo_id'=>$seoId,
                    'model_type'=>'Seo',
                    'image_name' =>$fileName,
                ]);
            }



    
        }
       
  
    }


    // insert Successfully 
    if($update){
        flash()->success('Information Update Successfuly');
    }else{
        flash()->error('Informatin Update Faild !');
    }

    return redirect()->back();

       
    }


   /**
    * ---------  soft Delete page functionality --------
    **/
    public function softdelete($id){
        $data= Category::where('id',$id)->first();
        $data->delete();


        // Delete Successfully 
        if($data){
            flash()->success('Information Update Successfuly');
        }else{
            flash()->error('Informatin Update Faild !');
        }

    return redirect()->back();

    }

   /**
    * ---------  restore  page functionality --------
    **/
    public function restore(){
       
    }




   /**
    * ---------  restore  page functionality --------
    **/
    public function delete($id){
        $data = Category::where('id', $id)->first();
    
        if($data) {
            // Delete all associated seo_image records first
            /**--------- Multiple file delete when you update new file ----------- */
            $SeoData =  Seo::where('unique_id',$data->id)->first()->id;
            $seoImage = Seo_image::where('seo_id',$SeoData)->get();
           // dd($seoImage);

            foreach ($seoImage as $images) {
                $file_path = public_path('storage/uploads/seo/'.$images->image_name);
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
                $images->delete(); 
            }

            /**---------- multiple file delete ---------- */
         
            // Force delete the category record
            $data->forceDelete();
    
        flash()->success('Record Deleted Successfully');
        } else {
            flash()->error('Delete Record Failed!');
        }
    
        return redirect()->back();
    }
    



   /**
    * ---------  Published post  functionality --------
    **/
    public function public_status($id,$slug){
        $published = Category::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
            'public_status'=>1,
        ]);
        // Delete Successfully 
        if($published){
            flash()->success('Information Published Successfully !');
        }else{
            flash()->error('Informatin Published Faild !');
        }
        return redirect()->back();
    }


   /**
    * ---------  Published post  functionality --------
    **/
    public function private_status($id,$slug){
        $private = Category::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
            'public_status'=>0,
        ]);
        // Delete Successfully 
        if($private){
            flash()->success('Information Private Successfully !');
        }else{
            flash()->error('Informatin Private Faild !');
        }
        return redirect()->back();
    }









   /**
    * ---------  restore  page functionality --------
    **/
    public function recycle(){
        $all = Category::all();
        return view('backend.categorys.category.recycle',compact('all'));
    }

    



    public function bulkAction(Request $request)
    {
        $ids = $request->input('ids', []);
        $action = $request->input('action');
    
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs selected.']);
        }
    
        if ($action === 'delete') {
            Category::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
    
        if ($action === 'archive') {
            Category::whereIn('id', $ids)->update(['is_archived' => true]);
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
    
        if ($action === 'refund') {
            // Refund logic (just for demo)
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }
    
        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    }
    














}
