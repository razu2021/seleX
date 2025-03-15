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



    public function product(){
        return view('frontend.pages.product');
    }








    







/** function body end  */
}
/** function body end  */
