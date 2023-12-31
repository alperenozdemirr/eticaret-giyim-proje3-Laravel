<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Baskets;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function show(){
        $baskets=Baskets::where('user_id',Auth::user()->id)->orderByDesc('id')->get();
        $total=0;
        $stock_out=0;
        foreach ($baskets as $basket){
            $total+=$basket->products->price*$basket->product_count;
            if ($basket->products->stock==0){ $stock_out=1; }
        }
        return view('frontend.shopping-cart',['baskets'=>$baskets,'total'=>$total,'stock_out'=>$stock_out]);
    }
    public function add(Request $request){
        $stock=Products::find($request->product_id);
        $check=Baskets::where('user_id',Auth::user()->id)
            ->where('product_id',$request->product_id)
            ->exists();
        if($stock->stock < $request->count){
            return back()->with('error','Yetersiz Stok');
        }
        //gelen id basket'de var ise eklemek yerine arttır
        if($check==true){
            $basket=Baskets::where('user_id',Auth::user()->id)
                ->where('product_id',$request->product_id)->first();
            $basket->product_count=$basket->product_count+$request->count;
        }else{
            $basket=new Baskets();
            $basket->user_id=Auth::user()->id;
            $basket->product_id=$request->product_id;
            $basket->product_count=$request->count;
        }
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    function delete($id){
        $basket=Baskets::find($id);
        $basket->delete();
        if ($basket){
            return redirect(route('shoppingCart'));
        }else{
            return back()->with('error','ok');
        }
    }

    public function countUp($id){
        $basket=Baskets::find($id);
        $count=$basket->product_count;
        $basket->product_count=$count+1;
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function countDown($id){
        $basket=Baskets::find($id);
        if ($basket->product_count!=1){
            $count=$basket->product_count;
            $basket->product_count=$count-1;
        }else{
            $basket->delete();
        }
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
}
