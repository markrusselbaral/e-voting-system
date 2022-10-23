<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoterLogin;
use App\Models\Course_section;
use DB;

class VotersController extends Controller
{
    public function index()
    {
        
        $voters = DB::table('voter_logins')
                ->join('course_sections', 'voter_logins.course_section_id', '=', 'course_sections.id')
                ->join('statuses', 'voter_logins.status_id', '=', 'statuses.id')
                ->select('voter_logins.ismis_id','voter_logins.fname','voter_logins.lname','voter_logins.course_section_id','voter_logins.status_id','voter_logins.id as voter_id','course_sections.*','statuses.*')
                ->get();

        $course_sections = Course_section::All();
        return view('admin.voters',compact('voters','course_sections'));
    }


    public function save(Request $request)
    {
        VoterLogin::create([
            'ismis_id' => $request->ismis_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'course_section_id' => $request->course_section,
            'status_id' => 1
        ]);

        return redirect()->route('index')->with('save','Voter Added Successfully');
    }


    public function edit($id)
    {
        $q = VoterLogin::find($id);
        return response()->json([
            'status'=>200,
            'voters' =>$q,
        ]);
    }

    public function update(Request $request)
    {
        VoterLogin::whereid($request->editid)
        ->update([
            'ismis_id' => $request->update_ismis_id,
            'fname' => $request->update_fname,
            'lname' => $request->update_lname,
            'course_section_id' => $request->update_course_section,
            'status_id' => 1 

        ]);
        return redirect()->route('index')->with('update','Voter Deleted Successfully');;
    }

    public function delete(Request $request)
    {
        VoterLogin::whereid($request->deleteid)->delete();
        return redirect()->route('index')->with('delete','Voter Deleted Successfully');
    }


    public function deleteAll(Request $request)
    {
       DB::table('voter_logins')->delete();
        return redirect()->route('index')->with('deleteAll','Voter Deleted Successfully');
    }

}
