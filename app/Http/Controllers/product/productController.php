<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
 


    public function add(){

        return view('backend.products.add');
    }
}
