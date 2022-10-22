<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoterLogin;
use Illuminate\Support\Facades\Hash;
use Storage;
use App\Models\Image;
use App\Models\Candidate;
use App\Models\Votes;

class UserController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function vote()
    {
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];

        $candidates = Candidate::join('positions', 'candidates.position_id', '=', 'positions.id')->select('positions.*','candidates.*')->orderBy('positions.id')
            ->get();

        return view('client.dashboard2', $data, compact('candidates'));
    }

    public function check(Request $request)
    {
        // $request ->validate([
        //         'ismis_id' => 'required',

        // ]);

        $userInfo = VoterLogin::where('ismis_id',$request->email)->first();

        if ($userInfo) {
            $request->session()->put('LoggedUser', $userInfo->id);
            return redirect()->route('vote');
        }
        else{
            return back()->with('fail', 'We do not recognize your email address');
        }

    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect()->route('login');
        }
    }

    public function submit_vote(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        $save = Storage::put($file, $image_base64);
        
        if($save)
        {
            Image::create([
                    'image_name' => $fileName,
                    'voter_id'      => $request->voter_id,
            ]);

                foreach($request->check as $key=>$name)
                {
                    $insert = [
                        'voter_id' => $request->voter_id,
                        'candidate_id' => $request->check[$key]
                    ];
                    Votes::insert($insert);
                }
            if(session()->has('LoggedUser'))
            {
                session()->pull('LoggedUser');
                return redirect()->route('login');
            }
        } 
    }
}
