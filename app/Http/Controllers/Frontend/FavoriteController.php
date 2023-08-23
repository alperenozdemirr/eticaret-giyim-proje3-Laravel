<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Baskets;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function list(){
        $favorites=Favorites::where('user_id',Auth::user()->id)->paginate(15);
        $count=Favorites::where('user_id',Auth::user()->id)->count();
        return view('frontend.favorites',['favorites'=>$favorites,'count'=>$count]);
    }
    public function add(Request $request){
        $check = Favorites::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->exists();
        if ($check==false) {
            $favorite = new Favorites();
            $favorite->product_id = $request->product_id;
            $favorite->user_id = Auth::user()->id;
            $favorite->save();
            return response()->json(['message' => 'Product added to favorites','status'=>'add']);
        } else {
            $favorite = Favorites::where('user_id', Auth::user()->id)
                ->where('product_id', $request->product_id)
                ->first();
            if ($favorite) {
                $favorite->delete();
                return response()->json(['message' => 'Product removed from favorites','status'=>'delete']);
            } else {
                return response()->json(['message' => 'Product not found in favorites']);
            }
        }
    }
    public function delete($id){
        $favorite=Favorites::find($id);
        $favorite->delete();
        if ($favorite){
            return redirect(route('favorites'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
}
