<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use DB;

class PositionsController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role == 'admin')
        {
            $positions = Position::all();
            return view('admin.positions', compact('positions'));
        }
        else
        {
            return "Forbidden";
        }
        
    }

    public function save(Request $request)
    {
        Position::create([

            'position' => $request->position,
            'position_order' => $request->position_order

        ]);

        return redirect()->route('position-index')->with('save','Position Added Successfully');
    }

     public function edit($id)
    {
        $q = Position::find($id);
        return response()->json([
            'status'=>200,
            'positions' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        Position::whereid($request->edit_position_id)
        ->update([

            'position' => $request->position_edit,
            'position_order' => $request->position_order_edit

        ]);

        return redirect()->route('position-index')->with('update','Position Added Successfully');
    }

    public function delete(Request $request)
    {
        Position::whereid($request->deleteid)->delete();
        return redirect()->route('position-index')->with('delete','Position Added Successfully');
    }


    public function deleteAll()
    {
        DB::table('positions')->delete();
        return redirect()->route('position-index')->with('deleteAll','Position Added Successfully');
    }
}
