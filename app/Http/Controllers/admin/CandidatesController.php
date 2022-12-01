<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use DB;
use App\Models\VoterLogin;
use App\Models\Partylist;
use App\Models\Position;
use Illuminate\Support\Facades\File;

class CandidatesController extends Controller
{
    public function index()
    {

        $position = Position::select('id','position')->get();
        $partylist = Partylist::select('id','partylists')->get();
        $candidate = DB::table('candidates')

            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->join('voter_logins', 'candidates.voters_id', '=', 'voter_logins.id')
            ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
            ->select('positions.position','voter_logins.ismis_id','candidates.id as cid','voter_logins.fname','voter_logins.lname','partylists.partylists','candidates.picture')
            ->orderBy('positions.id')
            ->get();

           return view('admin.candidates', compact('candidate','partylist','position'));
            // return $candidate;
    }

    public function save(Request $request)
    {

         if($request->hasfile('picture'))
        {

            $file = $request->file('picture');
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("uploads/image3/"),$imageName);
        
            Candidate::create([

                'voters_id' => $request->voters_id,
                'position_id' => $request->position_id,
                'partylist_id' => $request->partylist_id,
                'picture' => $imageName

            ]);
        }

        return redirect()->route('candidate-index')->with('save','Candidate Added Successfully');
    }



     public function search(Request $request)
    {

            $candidate = VoterLogin::select('id','fname','lname','ismis_id')
                        ->where('ismis_id',$request['inputSearch'])
                        ->get();
                         echo $candidate;

    }


     public function edit($id)
    {

        $q = Candidate::find($id);

        return response()->json([
            'status'=>200,
            'candidates' =>$q,
        ]);

    }
    

    public function update(Request $request)
    {

       $candidate = Candidate::find($request->edit_candidate_id);

       $candidate->position_id = $request->edit_position_id;
       $candidate->partylist_id = $request->edit_partylist_id;
       


          if($request->hasfile('picture_edit'))
        {
             $destination = 'uploads/image3/'.$candidate -> picture;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }

            $file = $request->file('picture_edit');
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("uploads/image3/"),$imageName);
            $candidate->picture = $imageName;

        }


        $candidate->update();

        

        return redirect()->route('candidate-index')->with('update','Candidate Added Successfully');
    }

    public function delete(Request $request)
    {
       
         $candidate = Candidate::find($request->deleteid);

        $destination = 'uploads/image3/'.$candidate -> picture;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $candidate -> delete();
        return redirect()->route('candidate-index')->with('delete','Candidate Added Successfully');
    }


    public function deleteAll()
    {
         
        File::cleanDirectory('uploads/image3/');
        DB::table('candidates')->delete();
        return redirect()->route('candidate-index')->with('deleteAll','Candidate Added Successfully');
    }
}
