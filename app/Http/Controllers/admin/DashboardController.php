<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Position;

class DashboardController extends Controller
{
    public function index()
    {
          $votes = DB::table('votes')
                    ->join('candidates', 'candidates.id', '=', 'votes.candidate_id')
                    ->select('candidates.fname','candidates.lname','candidates.course_section','candidates.department','candidates.college','candidates.position','candidates.partylist', DB::raw('count(votes.candidate_id) as votecount'))
                    ->groupBy('candidates.fname')
                    ->groupBy('candidates.lname')
                    ->groupBy('candidates.course_section')
                    ->groupBy('candidates.department')
                    ->groupBy('candidates.college')
                    ->groupBy('candidates.position')
                    ->groupBy('candidates.partylist')
                    ->orderBy('candidate_id')
                    ->get();

        return view('admin.dashboard', compact('votes'));
         // return $votes;
    }

    public function sample()
    {
       $candidate = DB::table('candidates')

            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->join('voter_logins', 'candidates.voters_id', '=', 'voter_logins.id')
            ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
            ->join('departments', 'departments.id', '=', 'candidates.department_id')
            ->join('colleges', 'colleges.id', '=', 'candidates.college_id')
            ->select('positions.position','voter_logins.ismis_id','candidates.id as cid','voter_logins.fname','voter_logins.lname','partylists.partylists','candidates.picture','departments.*','colleges.*')
            ->orderBy('positions.id')
            ->get();


            // return $candidate;
      // return view('client.sample', compact('candidate'));
       
    }
}
