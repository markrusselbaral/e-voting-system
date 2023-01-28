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
use App\Models\Position;
use Illuminate\Support\Str;
use App\Models\Verification;

class UserController extends Controller
{
    public function login()
    {
        $uniqid = Str::random(5); 
        return view('client.login2', compact('uniqid'));
    }

    public function vote()
    {
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];

        // $candidates = Candidate::join('positions', 'candidates.position_id', '=', 'positions.id')->select('positions.*','candidates.*')->orderBy('positions.id')
        //     ->get();

          // $candidates = Candidate::orderBy('position')->get();
        $candidates = Position::with('candidate')->get();

        
        
        if($data)
        {
            $uniqid = Str::random(5);
            $verification = Verification::where('voters_id',$data['LoggedUserInfo']['id'])->first();
            
            if($verification == null)
            {
                    Verification::Create([
                    'verification_number' => $uniqid,
                    'status' => 0,
                    'voters_id' => $data['LoggedUserInfo']['id']
                ]);

                    $verification_email = Verification::select('verification_number')->where('voters_id',$data['LoggedUserInfo']['id'])->first();

                    if($verification_email)
                    {
                        $mail_data = [
                        'recipient' => $data['LoggedUserInfo']['email'],
                        'fromEmail' => 'hr@newgenitsolution.tech',
                        'fromName' => 'markrusselbaral',
                        'subject' => 'Verification code',
                        'body' => $verification_email['verification_number']
                    ];

                        \Mail::send('admin.includes.email-template', $mail_data, function($message) use ($mail_data){
                            $message->to($mail_data['recipient'])
                                    ->from($mail_data['fromEmail'])
                                    ->subject($mail_data['subject']);
                        });
                    }
            }    

            

            else{
                 

                 Verification::where('voters_id',$data['LoggedUserInfo']['id'])->update([
                    'status' => 0,
                    'voters_id' =>$data['LoggedUserInfo']['id'] 
                ]);
            }

            

        }    


        return view('client.dashboard4', $data, compact('candidates'));
            // return $candidates;
    }

    public function check(Request $request)
    {
        // $request ->validate([
        //         'ismis_id' => 'required',

        // ]);

        $userInfo = VoterLogin::where('ismis_id',$request->email)->where('status','not yet')->first();

        if ($userInfo) {
            $request->session()->put('LoggedUser', $userInfo->id);
            return redirect()->route('vote');
        }
        else{
            return back()->with('fail', 'We do not recognize your ID number');
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
        // $img = $request->image;
        // $folderPath = "uploads/";
        
        // $image_parts = explode(";base64,", $img);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        
        // $image_base64 = base64_decode($image_parts[1]);
        // $fileName = uniqid() . '.png';
        
        // $file = $folderPath . $fileName;
        // $save = Storage::put($file, $image_base64);
        
        // if($save)
        // {
        //     $id=DB::select("SHOW TABLE STATUS LIKE 'images'");
        //     $next_id=$id[0]->Auto_increment;
        

        //     Image::create([
        //             'image_name' => $fileName,
        //             'voter_id'      => $request->voter_id,
        //     ]);

                foreach($request->check as $key=>$name)
                {
                   
                    $insert = [
                        'voter_id' => $request->voter_id,
                        'candidate_id' => $name,
                        'position_id' => $request->position[$key],
                        // 'images_id' => $next_id,
                        // 'check_id' =>$name,

                    ];
                    Votes::create($insert);
                
                }

                VoterLogin::whereid($request->voter_id)
                        ->update(['status' => 'voted']);


            if(session()->has('LoggedUser'))
            {
                session()->pull('LoggedUser');
                return redirect()->route('login');
            }
        // } 
    }

    public function edit($id)
    {

        // $candidates = Candidate::find($id);

        $candidates = DB::table('candidates')
                    ->join('positions', 'positions.id', '=', 'candidates.position_id')
                    ->select('positions.*','candidates.*','candidates.id as cid')
                    ->where('candidates.id',$id)
                    ->get();

        return response()->json([
            'status'=>200,
            'candidates' =>$candidates,
        ]);

    }


    public function verify(Request $request)
    {
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];

       $verify = Verification::select('verification_number')->where('verification_number',$request->verify)->where('voters_id',$data['LoggedUserInfo']['id'])->first();
       if($verify)
       {
            return response()->json("success");
            // Verification::where('voters_id',$data['LoggedUserInfo']['id'])->update([
            //     'status'
            // ])
       }
       else{
            return response()->json("Invalid Verification Code");
       }
       // return response()->json($verify);
       
    }
}
