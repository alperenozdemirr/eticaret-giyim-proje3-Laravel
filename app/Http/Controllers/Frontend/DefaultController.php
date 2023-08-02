<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Introduction;
use App\Models\Products;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function indexPage(){
        $introduction=Introduction::where('status',1)->first();
        $banners=Banners::orderBy('banner_order')->LIMIT(3)->get();
        $products=Products::orderByDesc('id')->paginate(12);
        return view('frontend.default.index',
            ['banners'=>$banners,'products'=>$products,'introduction'=>$introduction]);
    }
}
