<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use DB;
use Illuminate\Support\Facades\Hash;
 
class UserManagementController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user-management', compact('user'));
    }

    public function save(Request $request)
    {
         if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $imageName=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path("uploads/image3/"),$imageName);

                User::create([
                    'name' => $request->firstname.' '.$request->lastname,
                    'email' => $request->email,
                    'role' =>$request->role,
                    'password' => Hash::make($request->password),
                    'photo' => $imageName

                ]);
            }

        return redirect()->route('user-index')->with('save','User Saved Successfully');
    }


     public function edit($id)
    {
        $q = User::find($id);
        return response()->json([
            'status'=>200,
            'user' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        $user = User::find($request->edit_user_id);

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

                User::whereid($request->edit_user_id)->update([
                    'name' => $request->name_edit,
                    'email' => $request->email_edit,
                    'role' => $request->role_edit,
                    'photo' => $imageName

                ]);
            }

        return redirect()->route('user-index')->with('update','User Updated Successfully');
    }


    public function delete(Request $request)
    {
        $user = User::find($request->deleteid);
        $destination = 'uploads/image3/'.$user -> photo;
        if(File::exists($destination))
        {
            File::delete($destination);
            
        }
        $user->delete();
        return redirect()->route('user-index')->with('delete','User Deleted Successfully');
    }


    public function deleteAll()
    {
        File::cleanDirectory('uploads/image3/');
        DB::table('users')->delete();
        return redirect()->route('user-index')->with('deleteAll','Users Deleted Successfully');
    }
}
