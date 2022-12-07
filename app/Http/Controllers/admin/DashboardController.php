<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
          $votes = DB::table('votes')
                    ->join('voter_logins', 'voter_logins.id', '=', 'votes.candidate_id')
                    ->select('voter_logins.fname','voter_logins.lname', DB::raw('count(votes.candidate_id) as votecount'))
                    ->groupBy('voter_logins.fname')
                    ->groupBy('voter_logins.lname')
                    ->groupBy('votes.candidate_id')
                    ->get();

        return view('admin.dashboard', compact('votes'));


        // return $votes;
    }
}
