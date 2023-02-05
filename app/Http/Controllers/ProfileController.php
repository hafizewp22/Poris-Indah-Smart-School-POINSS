<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function ProfileUpdatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(Auth::user()->id)->update(
            ['password'=> Hash::make($request->new_password)]
        );

        Auth::logout();

        return redirect()->route('login');
    }

    public function UpdateProfileAdmin(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'profile_photo_path' => ['image', 'mimes:jpeg,png,jpg'],
        ]);

        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/images/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/images/admin_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        return redirect()->route('profile');
    }

    public function Profile(){
        if(Auth::id()){
            if(Auth::user()->user_type == '0'){
                return view('student.profile.profile');
            } elseif(Auth::user()->user_type == '1'){
                return view('admin.profile.profile');
            } elseif(Auth::user()->user_type == '2') {
                return view('teacher.profile.profile');
            }
        }else{
            return redirect()->back();
        }
    }

}
