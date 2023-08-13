<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id){
        $product=Products::find($id);
        return view('frontend.product-detail',['product'=>$product]);
    }
}
