<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Position;
use App\Models\Votes;

class DashboardController extends Controller
{
    public function index()
    {
          // $votes = DB::table('votes')
          //           ->join('candidates', 'candidates.id', '=', 'votes.candidate_id')
          //           ->select('candidates.fname','candidates.lname','candidates.course_section','candidates.department','candidates.college','candidates.position','candidates.partylist', DB::raw('count(votes.candidate_id) as votecount'))
          //           ->groupBy('candidates.fname')
          //           ->groupBy('candidates.lname')
          //           ->groupBy('candidates.course_section')
          //           ->groupBy('candidates.department')
          //           ->groupBy('candidates.college')
          //           ->groupBy('candidates.position')
          //           ->groupBy('candidates.partylist')
          //           ->orderBy('candidate_id')
          //           ->get();

        $votes = Position::with(['votes' => function($query) {
            $query->join('candidates', 'candidates.id', '=', 'votes.candidate_id');
            $query->select('candidates.fname','candidates.lname','candidates.position_id', DB::raw('count(votes.candidate_id) as votecount'));
            $query->groupBy('candidates.fname');
            $query->groupBy('candidates.lname');
            $query->groupBy('candidates.position_id');



            // $query->select('votes.candidate_id','votes.position_id',DB::raw('count(votes.candidate_id) as votecount'));
            // $query->groupBy('votes.candidate_id');
            // $query->groupBy('votes.position_id');
            
        }])->get();

        // $votes = Position::with('votes')->get();


        // $votes = Position::with('votes')
        //         // ->join('candidates', 'candidates.id', '=', 'votes.candidate_id')
        //         // ->select(DB::raw('count(votes.candidate_id) as votecount'))
        //             // ->select('positions[votes].voter_id')
        //         ->get();

        return view('admin.dashboard', compact('votes'));
         // return $votes;
    }

   
}
