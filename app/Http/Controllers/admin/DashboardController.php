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

        $votes = Position::with(['votes' => function($query) {
            $query->join('candidates', 'candidates.id', '=', 'votes.candidate_id');
            $query->select('ismis_id','candidates.fname','candidates.lname','candidates.position_id', DB::raw('count(votes.candidate_id) as votecount'));
            $query->groupBy('candidates.fname');
            $query->groupBy('candidates.lname');
            $query->groupBy('candidates.position_id');  
            $query->groupBy('candidates.ismis_id');      
        }])->get();
        return view('admin.dashboard', compact('votes'));

    }

   
}
