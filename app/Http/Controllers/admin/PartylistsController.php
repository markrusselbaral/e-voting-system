<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partylist;
use DB;

class PartylistsController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role == 'admin')
        {
            $partylist = Partylist::all();
            return view('admin.partylists', compact('partylist'));
        }
        else
        {
            return "Forbidden";
        }
    }

    public function save(Request $request)
    {
        Partylist::create([

            'partylists' => $request->partylist,

        ]);

        return redirect()->route('partylist-index')->with('save','Partylist Added Successfully');
    }

     public function edit($id)
    {
        $q = Partylist::find($id);
        return response()->json([
            'status'=>200,
            'partylists' =>$q,
        ]);

    }

    public function update(Request $request)
    {
        Partylist::whereid($request->edit_partylist_id)
        ->update([

            'partylists' => $request->partylist_edit,

        ]);

        return redirect()->route('partylist-index')->with('update','Partylist Added Successfully');
    }

    public function delete(Request $request)
    {
        Partylist::whereid($request->deleteid)->delete();
        return redirect()->route('partylist-index')->with('delete','Partylist Added Successfully');
    }


    public function deleteAll()
    {
        DB::table('partylists')->delete();
        return redirect()->route('partylist-index')->with('deleteAll','Partylist Added Successfully');
    }
}
