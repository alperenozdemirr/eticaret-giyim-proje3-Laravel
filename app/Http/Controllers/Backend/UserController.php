<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Baskets;
use App\Models\Comments;
use App\Models\Favorites;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lists(){
        $users=User::paginate(20);
        return view('backend.user-list',['users'=>$users]);
    }
    public function userDetails($id){
        $user=User::find($id);
        return view('backend.user-detail',['user'=>$user]);
    }
    public function changeType(Request $request){
        $user=User::find($request->id);
        $user->type=$request->type;
        $user->save();
        if ($user){
            return redirect(route('bekci.userList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function changeStatus(Request $request){
        $user=User::find($request->id);
        $user->status=$request->status;
        $user->save();
        if ($user){
            return redirect(route('bekci.userList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function search(Request $request){
        $search=$request->input('search');
        $users=User::where('name','LIKE',"%$search%")->paginate(20);
        return view('backend.user-list',['users'=>$users]);
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        if($user){
            Orders::where('user_id',$id)->delete();
            OrderDetails::where('user_id',$id)->delete();
            Favorites::where('user_id',$id)->delete();
            Baskets::where('user_id',$id)->delete();
            Comments::where('user_id',$id)->delete();
            Address::where('user_id',$id)->delete();
          return redirect(route('bekci.userList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
}
