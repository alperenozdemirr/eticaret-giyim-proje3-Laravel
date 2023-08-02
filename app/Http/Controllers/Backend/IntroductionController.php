<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IntroductionController extends Controller
{
    // aktif ederken ilk önce hepsinin status değerini sıfırla sonrasın aktif et
    public function lists(){
        $introductions=Introduction::orderByDesc('id')->get();
        return view('backend.introduction-list')->with(compact('introductions'));
    }
    public function addPage(){
        return view('backend.introduction-new');
    }
    public function add(Request $request){
        $request->flash();
        $directory=public_path('public_directory').'/image/introductions';
        if($image = $request->file('image')){
            $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();

            $introduction=new Introduction();
            $introduction->subtitle=$request->subtitle;
            $introduction->main_title=$request->main_title;
            $introduction->info=$request->info;
            $introduction->url=$request->url;
            $introduction->image=$imageName;
            $introduction->status=0;
            $introduction->save();
            if ($introduction){
                $image->move($directory,$imageName);
                return redirect(route('bekci.introductionList'))->with('success','ok');
            }else{
                return back()->withInput()->with('error','ok');
            }

        }

    }
    public function updatePage($id){
        $introduction=Introduction::find($id);
        return view('backend.introduction-update')->with(compact('introduction'));
    }
    public function update(Request $request){
        $directory=public_path('public_directory').'/image/introductions';

        $introduction=Introduction::find($request->id);
        $cache_img=$introduction->image;
        $introduction->subtitle=$request->subtitle;
        $introduction->main_title=$request->main_title;
        $introduction->info=$request->info;
        $introduction->url=$request->url;
        $introduction->status=0;
        if ($image= $request->file('image')){
            $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
            $introduction->image=$imageName;
        }
        $introduction->save();
        if($introduction){
            if ($image){
                File::delete($directory.'/'.$cache_img);
                $image->move($directory,$imageName);
            }
            return redirect(route('bekci.introductionList'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function delete($id){
        $directory=public_path('public_directory').'/image/introductions';
        $introduction=Introduction::find($id);
        $image=$introduction->image;
        $introduction->delete();
        if($introduction){
            File::delete($directory.'/'.$image);
            return redirect(route('bekci.introductionList'))->with('success','ok');
        }else{
            return redirect(route('bekci.introductionList'))->with('error','ok');
        }
    }
    public function active($id){
        $introduction = Introduction::find($id);
        $reset = Introduction::where('status', 1)->update(['status' => 0]);
        if ($reset) {
            if ($introduction) {
                $introduction->status = 1;
                $introduction->save();
                return redirect(route('bekci.introductionList'))->with('success', 'ok');
            } else {
                return redirect(route('bekci.introductionList'))->with('error', 'ok');
            }
        } else {
            return redirect(route('bekci.introductionList'))->with('error', 'ok');
        }
    }
}
