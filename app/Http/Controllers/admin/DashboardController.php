<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Position;
use App\Models\Votes;
use App\Models\Candidate;
use App\Models\VoterLogin;

class DashboardController extends Controller
{
    public function index()
    {

        $votes = Position::with(['votes' => function($query) {
            $query->join('candidates', 'candidates.id', '=', 'votes.candidate_id');
            $query->select('ismis_id','candidates.fname','candidates.lname','candidates.position_id', DB::raw('count(votes.candidate_id) as votecount'));
            $query->groupBy('candidates.fname');
            $query->groupBy('candidates.lname');
            $query->groupBy('candidates.position_id');  
            $query->groupBy('candidates.ismis_id');      
        }])->get();

        $candidate1 = Candidate::count();
        $position1 = Position::count();
        $voterlogin1 = VoterLogin::count();
        $voted1 = VoterLogin::select('*')->where('status','voted')->count();

        return view('admin.dashboard', compact('votes','candidate1','position1','voterlogin1','voted1'));

    }

   
}
