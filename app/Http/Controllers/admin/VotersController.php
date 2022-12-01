<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoterLogin;
use App\Models\Course_section;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VotersImport;
use App\Exports\VotersExport;
use App\Models\College;
use App\Models\Department;

class VotersController extends Controller
{
    public function index()
    {
        
        $voters = DB::table('voter_logins')
                ->join('course_sections', 'voter_logins.course_section_id', '=', 'course_sections.id')
                ->join('statuses', 'voter_logins.status_id', '=', 'statuses.id')
                ->join('departments', 'departments.id', '=', 'voter_logins.department_id')
                ->join('colleges', 'colleges.id', '=', 'voter_logins.college_id')
                ->select('voter_logins.ismis_id','voter_logins.fname','voter_logins.lname','voter_logins.course_section_id','voter_logins.status_id','voter_logins.id as voter_id','course_sections.*','statuses.*','departments.*','colleges.*')
                ->get();

        $course_sections = Course_section::All();
        $department = Department::All();
        $college = College::All();
        return view('admin.voters',compact('voters','course_sections','department','college'));
    }


    public function save(Request $request)
    {
        VoterLogin::create([
            'ismis_id' => $request->ismis_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'course_section_id' => $request->course_section,
            'status_id' => 1,
            'department_id' => $request->department,
            'college_id' => $request->college
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
            'status_id' => 1,
            'department_id' => $request->edit_department,
            'college_id' => $request->edit_college

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

     public function fileImport(Request $request) 
    {
        Excel::import(new VotersImport, $request->file('file')->store('temp'));
        return redirect()->back();
    }

     public function fileExport() 
    {
        return Excel::download(new VotersExport, 'voters.xlsx');
    }  

}
