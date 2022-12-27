<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use DB;

class CollegesController extends Controller
{
     public function index()
    {
        $college = College::all();
        return view('admin.colleges', compact('college'));
    }

    public function save(Request $request)
    {
        College::create([

            'colleges' => $request->college,

        ]);

        return redirect()->route('college-index')->with('save','College Added Successfully');
    }

     public function edit($id)
    {
        $q = College::find($id);
        return response()->json([
            'status'=>200,
            'colleges' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        College::whereid($request->edit_college_id)
        ->update([

            'colleges' => $request->college_edit,

        ]);

        return redirect()->route('college-index')->with('update','College Added Successfully');
    }

    public function delete(Request $request)
    {
        College::whereid($request->deleteid)->delete();
        return redirect()->route('college-index')->with('delete','College Deleted Successfully');
    }


    public function deleteAll()
    {
        DB::table('colleges')->delete();
        return redirect()->route('college-index')->with('deleteAll','Colleges Deleted Successfully');
    }
}
