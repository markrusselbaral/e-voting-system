<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use DB;

class CandidatesController extends Controller
{
    public function index()
    {
        
         $candidate = DB::table('candidates')

            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->join('voter_logins', 'candidates.voters_id', '=', 'voter_logins.id')
            ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
            ->select('positions.position','voter_logins.ismis_id','candidates.id as cid','voter_logins.fname','voter_logins.lname','partylists.partylists')
            ->orderBy('positions.id')
            ->get();

           return view('admin.candidates', compact('candidate'));
            // return $candidate;
    }

    public function save(Request $request)
    {
        College::create([

            'colleges' => $request->college,

        ]);

        return redirect()->route('college-index')->with('save','College Added Successfully');
    }



     public function search(Request $request)
    {

        $candidate = DB::table('candidates')

            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->join('voter_logins', 'candidates.voters_id', '=', 'voter_logins.id')
            ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
            ->select('positions.position','voter_logins.fname','voter_logins.lname','partylists.partylists')
            ->where('voter_logins.ismis_id',$request['inputSearch'])
            ->orderBy('positions.id')
            ->get();

            echo $candidate;
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
