<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $update = '';
            User::whereid(Auth::User()->id)->update([
                'name' => $request->name,
                'email' => $request->email,

            ]);

          
        return redirect()->route('profile-index')->with($update,'update');
    }



    public function change_password(Request $request)
    {
        if(Hash::check($request->password1,Auth::User()->password))
            {
               User::whereid(Auth::User()->id)->update([
                'password' => Hash::make($request->password2),
                ]);
               $update = 'Password Successfully Updated';
            }

        else
        {
            $update = 'Invalid Password';
        }

        return redirect()->route('profile-index')->with($update,'password');
    }



    public function update_photo(Request $request)
    {
        $user = User::find(Auth::User()->id);

        if($request->hasfile('photo_edit'))
            {
                $destination = 'uploads/image3/'.$user -> photo;
                 if(File::exists($destination))
                 {
                     File::delete($destination);
                 }

                     $file = $request->file('photo_edit');
                     $imageName=time().'_'.$file->getClientOriginalName();
                     $file->move(\public_path("uploads/image3/"),$imageName);

                     User::whereid(Auth::User()->id)->update([
                        'photo' => $imageName,

                    ]);
                     $update = 'Profile Successfully Updated';
             }

        return redirect()->route('profile-index')->with($update, 'update');

    }
}
