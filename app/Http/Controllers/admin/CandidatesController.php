<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use DB;
use App\Models\VoterLogin;
use App\Models\Partylist;
use App\Models\Position;

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
            ->select('positions.position','voter_logins.ismis_id','candidates.id as cid','voter_logins.fname','voter_logins.lname','partylists.partylists')
            ->orderBy('positions.id')
            ->get();

           return view('admin.candidates', compact('candidate','partylist','position'));
            // return $candidate;
    }

    public function save(Request $request)
    {
        Candidate::create([

            'voters_id' => $request->voters_id,
            'position_id' => $request->position_id,
            'partylist_id' => $request->partylist_id

        ]);

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

        // $q = DB::table('candidates')
        //     ->join('positions', 'positions.id', '=', 'candidates.position_id')
        //     ->join('partylists', 'partylists.id', '=', 'candidates.partylist_id')
        //     ->select('positions.position','partylists.partylists')
        //     ->where('candidates.id',$id)
        //     ->get();

        $q = Candidate::find($id);

        return response()->json([
            'status'=>200,
            'candidates' =>$q,
        ]);

    }
    

    public function update(Request $request)
    {
        College::whereid($request->edit_college_id)
        ->update([

            'colleges' => $request->college_edit,

        ]);

        return redirect()->route('college-index')->with('update','College Added Successfully');
    }

    public function delete(Request $request)
    {
        College::whereid($request->deleteid)->delete();
        return redirect()->route('college-index')->with('delete','College Added Successfully');
    }


    public function deleteAll()
    {
        DB::table('colleges')->delete();
        return redirect()->route('college-index')->with('deleteAll','College Added Successfully');
    }
}
