<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function detail($id){
        $product=Products::find($id);
        $comments=Comments::where('product_id',$id)->where('status',1)->get();
        return view('frontend.product-detail',['product'=>$product,'comments'=>$comments]);
    }
    public function newComment(Request $request){
        $request->validate([
            'product_id'=>'required',
            'comment_content'=>'required'
        ]);
        $comment=new Comments();
        $comment->product_id=$request->product_id;
        $comment->user_id=Auth::user()->id;
        $comment->content=$request->comment_content;
        $comment->status=1;
        $comment->save();
        if ($comment){
            return redirect(route('productDetail',$request->product_id))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }

}


