<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Startelection;

class TitleController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role == 'admin')
        {
            $title = Title::all();
            $startorstop = Startelection::select('startorstop')->first();

            if($startorstop['startorstop'] == '0')
            {
                $election = 'Start';
                $color = '#97cf8a;';
            }
            else{
                $color = '#FA5C7C;';
                $election = 'Stop';
            }
            return view('admin.title', compact('title','election','color'));
        }
        else
        {
            return "Forbidden";
        }
        
    }


    public function edit($id)
    {
        $q = Title::find($id);
        return response()->json([
            'status'=>200,
            'title' =>$q,
        ]);

    }


    public function update(Request $request)
    {
        Title::whereid($request->edit_title_id)->update([
            'title' => $request->title_edit,
        ]);

        return redirect()->route('title-index')->with('update','Title Updated Successfully');;
    }
}
