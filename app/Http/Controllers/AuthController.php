<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;

class AuthController extends Controller
{
    public function Logout(){
        Auth::logout();
     
        return redirect()->route('login');
    }
    public function profile(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('admin.user.userdetails',compact('user'));
    }
    public function password(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('admin.user.password',compact('user'));
    }
    public function updatepass(Request $request){
       $validdata=$request->validate([
        'oldpassword'=> 'required' ,
        'password'=> 'required|confirmed'
       ]);
       $hashpass=Auth::user()->password;
       if(Hash::check($request->oldpassword,$hashpass)){
        $user= User::find(Auth::id());
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::logout();
       }
        return redirect()->route('login');
    }
    public function edit(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request ){
        $data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;

    	if ($request->file('profile_photo_path')) {
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
    	}
       
    	$data->save();

    	return redirect()->route('user.profile');
    }
}
