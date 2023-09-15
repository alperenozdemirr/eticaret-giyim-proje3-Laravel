<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function show(){
        $cities=Cities::all();
        return view('frontend.account',['cities'=>$cities]);
    }
    public function profile(){
        $selectedCity=Address::where('user_id',Auth::user()->id)->where('status',1)->first();
        $user=User::find(Auth::user()->id);
        $address=Address::where('user_id',Auth::user()->id)->get();
        $address->load('cities');
        return response()->json(['user'=>$user,'selectedCity'=>$selectedCity,'address'=>$address]);
    }
    public function profileUpdate(Request $request){
        $request->validate(['name'=>'required']);
        $user=User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->save();
        if ($user){
            return response()->json(['message'=>'Bilgileriniz Güncellendi']);
        }else{
            return response()->json(['message'=>'Bir hata oluştu!']);
        }
    }
    public function addressAdd(Request $request){
        $request->validate([
            'title,value,city,post_code'=>'required'
        ]);
        $address=new Address();
        $address->title=$request->title;
        $address->value=$request->value;
        $address->city=$request->city;
        $address->post_code=$request->post_code;
        $address->user_id=Auth::user()->id;
        $address->save();
        if ($address){
            return response()->json(['message'=>'Yeni Adresiniz Eklendi']);
        }else{
            return response()->json(['message'=>'Eksik bilgi girişi']);
        }
    }
    public function addressGet($id){
        //eğer find ile sogulanırsa başka birinin adresi sorgulanabilir
        //xss zaafiyatı ortaya cıkar
        //$address=Address::find($id);
        $address=Address::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return response()->json(['address'=>$address]);
    }
    public function addressUpdate(Request $request){
        $request->validate([
            'title,value,city,post_code'=>'required'
        ]);
        $address= Address::find($request->id);
        $address->title=$request->title;
        $address->value=$request->value;
        $address->city=$request->city;
        $address->post_code=$request->post_code;
        $address->save();
        if ($address){
            return response()->json(['message'=>'Adresiniz başarıyla güncellendi']);
        }else{
            return response()->json(['message'=>'Eksik bilgi girişi']);
        }
    }
    public function addressDelete($id){
        $address=Address::find($id);
        $address->delete();
        if ($address){
            return response()->json(['message'=>'Adres Silindi']);
        }else{
            return response()->json(['message'=>'İşlem başarısız']);
        }
    }
    public function imageChange(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,image,png|max:12096'
        ]);
        $directory=public_path('public_directory').'/image/users';
        $userID=Auth::user()->id;
        $user=User::find($userID);
        $cache_img=$user->image;
        $image=$request->file('image');
        $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
        $user->image=$imageName;
        $user->save();
        if ($user){
            File::delete($directory.'/'.$cache_img);
            $image->move($directory,$imageName);
            return redirect(route('my.account'))->with('success','ok');
        }else{
            return back();
        }
        /*if($user){
            File::delete($directory.'/'.$cache_img);
            $image->move($directory,$imageName);
            return response()->json(['message'=>'Resminiz Güncellendi']);
        }else{
            return response()->json(['message'=>'Başka resim seçiniz.']);
        }*/
    }
}
