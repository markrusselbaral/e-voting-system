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
use App\Models\Status;

class VotersController extends Controller
{
    public function index()
    {
        
        $voters = VoterLogin::all();
        $course_sections = Course_section::All();
        $department = Department::All();
        $college = College::All();
        $status = Status::all();
        return view('admin.voters',compact('voters','course_sections','department','college','status'));
    }


    public function save(Request $request)
    {
        VoterLogin::create([
            'ismis_id' => $request->ismis_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'course_section' => $request->course_section,
            'status' => $request->statuses,
            'department' => $request->department,
            'college' => $request->college
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
            'course_section' => $request->update_course_section,
            'status' => $request->edit_statuses,
            'department' => $request->edit_department,
            'college' => $request->edit_college

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
