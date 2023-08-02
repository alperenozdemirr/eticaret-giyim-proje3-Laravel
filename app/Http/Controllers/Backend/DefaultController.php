<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function indexPage(){
        return view('backend.default.index');
    }
}
