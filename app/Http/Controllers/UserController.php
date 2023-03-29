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
use App\Models\Startelection;
use App\Models\Title;

class UserController extends Controller
{
    public function login()
    {
        return view('client.login2');
    }

    public function vote()
    {
        // not yet done
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];

        // CTAS
        if($data['LoggedUserInfo']['college'] == 'CTAS' && $data['LoggedUserInfo']['department'] == 'DCOS')
        {
            $candidates = Position::with('candidate')
                ->whereIn('position', [
                    'CTAS GOVERNOR', 
                    'CTAS VICE GOVERNOR', 
                    'DCOS REPRESENTATIVE', 
                    'PRESIDENT', 
                    'VICE PRESIDENT', 
                    'SENATOR'])
                ->select('positions.*')
                ->get();

        }

        // else if($data['LoggedUserInfo']['college'] == 'CTAS' && $data['LoggedUserInfo']['department'] == 'DBOA')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CTAS GOVERNOR')
        //         ->where('position','=','CTAS VICE GOVERNOR')
        //         ->where('position','=','DBOA REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // else if($data['LoggedUserInfo']['college'] == 'CTAS' && $data['LoggedUserInfo']['department'] == 'DHMIT')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CTAS GOVERNOR')
        //         ->where('position','=','CTAS VICE GOVERNOR')
        //         ->where('position','=','DHMIT REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // // CTAS


        // // CANR
        // else if($data['LoggedUserInfo']['college'] == 'CANR' && $data['LoggedUserInfo']['department'] == 'FESS')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CANR GOVERNOR')
        //         ->where('position','=','CANR VICE GOVERNOR')
        //         ->where('position','=','FESS REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // else if($data['LoggedUserInfo']['college'] == 'CANR' && $data['LoggedUserInfo']['department'] == 'ASA')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CANR GOVERNOR')
        //         ->where('position','=','CANR VICE GOVERNOR')
        //         ->where('position','=','ASA REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
                
        //         ->get();
        // }
        // else if($data['LoggedUserInfo']['college'] == 'CANR' && $data['LoggedUserInfo']['department'] == 'DABE')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CANR GOVERNOR')
        //         ->where('position','=','CANR VICE GOVERNOR')
        //         ->where('position','=','DABE REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // // CANR

        // // CTE
        // else if($data['LoggedUserInfo']['college'] == 'CTE' && $data['LoggedUserInfo']['department'] == 'DGED')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CTE GOVERNOR')
        //         ->where('position','=','CTE VICE GOVERNOR')
        //         ->where('position','=','DGED REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // else if($data['LoggedUserInfo']['college'] == 'CTE' && $data['LoggedUserInfo']['department'] == 'DGED')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CTE GOVERNOR')
        //         ->where('position','=','CTE VICE GOVERNOR')
        //         ->where('position','=','DGED REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }
        // else if($data['LoggedUserInfo']['college'] == 'CTE' && $data['LoggedUserInfo']['department'] == 'DSED')
        // {
        //     $candidates = Position::with('candidate')
        //         ->select('*')
        //         ->where('position','=','CTE GOVERNOR')
        //         ->where('position','=','CTE VICE GOVERNOR')
        //         ->where('position','=','DSED REPRESENTATIVE')
        //         ->where('position','=','PRESIDENT')
        //         ->where('position','=','VICE PRESIDENT')
        //         ->where('position','=','SENATOR')
        //         ->get();
        // }


        // not yet done


        $title = Title::select('title')->first();
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
                        'fromEmail' => 'evoting@bisubilar.org',
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


        return view('client.dashboard4', $data, compact('candidates','title'));
            // return $candidates;
    }

    public function check(Request $request)
    {
        // $request ->validate([
        //         'ismis_id' => 'required',

        // ]);

        $userInfo = VoterLogin::where('ismis_id',$request->email)->where('status','not yet')->first();

        $electionStatus = Startelection::select('startorstop')->first();

        if ($userInfo && $electionStatus['startorstop'] == '1') {
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
        $data = ['LoggedUserInfo'=>VoterLogin::where('id', session('LoggedUser'))->first()];
        $verify = Verification::select('status')->where('status',1)->where('voters_id',$data['LoggedUserInfo']['id']);

        if ($verify)
        {
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
            Verification::where('voters_id',$data['LoggedUserInfo']['id'])->update([
                    'status' => 1
                ]);
            return response()->json("success");
            
       }
       else{
            return response()->json("Invalid Verification Code");
       }
       
    }
}
