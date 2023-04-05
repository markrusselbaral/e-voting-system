<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course_section;
use DB;
use Illuminate\Support\Facades\Auth;

class CoursesectionController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role == 'admin')
        {
            $course_section = Course_section::all();
            return view('admin.course_sections', compact('course_section'));
        }
        else
        {
            return "Forbidden";
        }
        
    }

    public function save(Request $request)
    {
        Course_section::create([

            'course_sections' => $request->course_section,

        ]);

        return redirect()->route('course-section-index')->with('save','Course & Section Added Successfully');
    }

     public function edit($id)
    {
        $q = Course_section::find($id);
        return response()->json([
            'status'=>200,
            'course_sections' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        Course_section::whereid($request->edit_course_section_id)
        ->update([

            'course_sections' => $request->course_section_edit,

        ]);

        return redirect()->route('course-section-index')->with('update','Course & Section & Section Added Successfully');
    }

    public function delete(Request $request)
    {
        Course_section::whereid($request->deleteid)->delete();
        return redirect()->route('course-section-index')->with('delete','Course & Section Added Successfully');
    }


    public function deleteAll()
    {
        DB::table('course_sections')->delete();
        return redirect()->route('course-section-index')->with('deleteAll','Course & Section Added Successfully');
    }
}
