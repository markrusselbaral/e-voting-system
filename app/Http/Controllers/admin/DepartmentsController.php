<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view('admin.departments', compact('department'));
    }

    public function save(Request $request)
    {
        Department::create([

            'departments' => $request->department,

        ]);

        return redirect()->route('department-index')->with('save','Department Added Successfully');
    }

     public function edit($id)
    {
        $q = Department::find($id);
        return response()->json([
            'status'=>200,
            'departments' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        Department::whereid($request->edit_department_id)
        ->update([

            'departments' => $request->department_edit,

        ]);

        return redirect()->route('department-index')->with('update','Department Added Successfully');
    }

    public function delete(Request $request)
    {
        Department::whereid($request->deleteid)->delete();
        return redirect()->route('department-index')->with('delete','Department Added Successfully');
    }


    public function deleteAll()
    {
        DB::table('departments')->delete();
        return redirect()->route('department-index')->with('deleteAll','Department Added Successfully');
    }
}
