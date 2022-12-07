<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoterLogin;
use Illuminate\Support\Facades\Hash;
use Storage;
use App\Models\Image;
use App\Models\Candidate;
use App\Models\Votes;
use DB;

class UserController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function vote()
    {
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];

        // $candidates = Candidate::join('positions', 'candidates.position_id', '=', 'positions.id')->select('positions.*','candidates.*')->orderBy('positions.id')
        //     ->get();

         $candidates = DB::table('candidates')

            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->join('voter_logins', 'candidates.voters_id', '=', 'voter_logins.id')
            ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
            ->select('positions.position','voter_logins.ismis_id','candidates.id as cid','voter_logins.fname','voter_logins.lname','voter_logins.id as vid','partylists.partylists','candidates.picture')
            ->orderBy('positions.position_order')
            ->get();

        return view('client.dashboard3', $data, compact('candidates'));
            // return $candidates;
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
            $id=DB::select("SHOW TABLE STATUS LIKE 'images'");
            $next_id=$id[0]->Auto_increment;
        

            Image::create([
                    'image_name' => $fileName,
                    'voter_id'      => $request->voter_id,
            ]);

                foreach($request->check as $key=>$name)
                {
                    $insert = [
                        'voter_id' => $request->voter_id,
                        'candidate_id' => $request->check[$key],
                        'images_id' => $next_id
                    ];
                    Votes::create($insert);
                }
            if(session()->has('LoggedUser'))
            {
                session()->pull('LoggedUser');
                return redirect()->route('login');
            }
        } 
    }
}
