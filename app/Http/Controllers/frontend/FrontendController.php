<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**----------  index page function ----- */
    public function index(){

        return view('frontend.index');
    }
    /**----------  about page function ----- */
    public function about(){
        return view('frontend.pages.about');
    }

    /** category product  */
    public function product_category($url,$slug){

        $data = Category::with(['subcategorys'])
        ->where('public_status',1)->where('url',$url)->where('slug',$slug)->firstOrFail();
        //dd($data);
        return view('frontend.pages.category_product',compact('data'));
    }

    /** category product  */
    public function sub_category_product(){
        return view('frontend.pages.sub_category_product');
    }
    /** category product  */
    public function sub_sub_category_product(){
        return view('frontend.pages.sub_sub_category_product');
    }





    /** Purchese product  */
    public function purchese_product(){
        return view('frontend.pages.purchase');
    }








    







/** function body end  */
}
/** function body end  */
