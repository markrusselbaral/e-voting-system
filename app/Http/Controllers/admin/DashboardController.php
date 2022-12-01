<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $votes = DB::table('votes')
        //         ->select('','voter_logins.fname','voter_logins.lname','votes.candidate_id', DB::raw('count(votes.candidate_id) as votecount'))
        //         ->join('voter_logins', 'voter_logins.id', '=', 'votes.voter_id')
        //         ->join('candidates', 'candidates.id', '=', 'votes.candidate_id')
        //         ->join('images', 'images.id', '=', 'votes.images_id')
        //         ->groupBy('votes.candidate_id')
        //         ->groupBy('voter_logins.fname')
        //         ->groupBy('voter_logins.lname')
        //         ->get();

        return view('admin.dashboard');

        // return $votes;
    }
}
