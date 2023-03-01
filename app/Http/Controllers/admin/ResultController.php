<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Position;
use App\Models\Votes;
use App\Models\Candidate;
use App\Models\VoterLogin;

class ResultController extends Controller
{
    public function result()
    {
        $votes = Position::with(['votes' => function($query) {
            $query->join('candidates', 'candidates.id', '=', 'votes.candidate_id');
            $query->select('ismis_id','candidates.fname','candidates.lname','candidates.position_id', DB::raw('count(votes.candidate_id) as votecount'));
            $query->groupBy('candidates.fname');
            $query->groupBy('candidates.lname');
            $query->groupBy('candidates.position_id');  
            $query->groupBy('candidates.ismis_id'); 
            $query->orderBy('voteCount','desc');     
        }])->get();


    
        return view('admin.result', compact('votes'));
    }




    // public function winners()
    // {
    //     $votes = Position::with(['votes' => function($query) {
    //         $query->join('candidates', 'candidates.id', '=', 'votes.candidate_id');
    //         $query->select('ismis_id','candidates.fname','candidates.lname','candidates.position_id', DB::raw('count(votes.candidate_id) as votecount'));
    //         $query->groupBy('candidates.fname');
    //         $query->groupBy('candidates.lname');
    //         $query->groupBy('candidates.position_id');  
    //         $query->groupBy('candidates.ismis_id');      
    //     }])->get();

    //     return $votes[];

    //     // return view('admin.result', compact('votes'));
    // }
}
