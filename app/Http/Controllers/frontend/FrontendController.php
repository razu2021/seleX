<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
    public function product(){
        return view('frontend.pages.category_product');
    }

    /** category product  */
    public function sub_category_product(){
        return view('frontend.pages.sub_category_product');
    }
    /** category product  */
    public function sub_sub_category_product(){
        return view('frontend.pages.sub_sub_category_product');
    }








    







/** function body end  */
}
/** function body end  */
