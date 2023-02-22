<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use DB;
use App\Models\VoterLogin;
use App\Models\Partylist; 
use App\Models\Position;
use App\Models\Department;
use App\Models\College;
use Illuminate\Support\Facades\File;

class CandidatesController extends Controller
{
    public function index()
    {

        $position = Position::select('id','position')->get();
        $partylist = Partylist::select('id','partylists')->get();
        $department = Department::select('id','departments')->get();
        $college = College::select('id','colleges')->get();
        // $candidate = Candidate::all();
        $candidate = DB::table('candidates')
                    ->join('positions', 'positions.id', '=', 'candidates.position_id')
                    ->select('candidates.*','positions.*','positions.id as pid','candidates.id as cid')
                    ->get();

           return view('admin.candidates', compact('candidate','partylist','position','department','college'));
            // return $candidate;
    }

    public function save(Request $request)
    {

         if($request->hasfile('picture'))
        {

            $file = $request->file('picture');
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\storage_path("uploads/image3/"),$imageName);
        
            Candidate::create([

                'ismis_id' => $request->inputSearch,
                'fname' => $request->firstname,
                'lname' => $request->lastname,
                'course_section' => $request->course,
                'department' => $request->department,
                'college' => $request->college,
                'position_id' => $request->position,
                'partylist' => $request->partylist,
                'picture' => $imageName

            ]);
        }

        return redirect()->route('candidate-index')->with('save','Candidate Added Successfully');
    }



     public function search(Request $request)
    {

        $candidate = VoterLogin::where('ismis_id',$request['inputSearch'])
                        ->get();
                         echo $candidate;

    }


     public function edit($id)
    {

        $q = Candidate::find($id);


        return response()->json([
            'status'=>200,
            'candidates' =>$q,
        ]);

    }
    

    public function update(Request $request)
    {

       $candidate = Candidate::find($request->edit_candidate_id);

       $candidate->position_id = $request->edit_position_id;
       $candidate->partylist = $request->edit_partylist_id;
       


          if($request->hasfile('picture_edit'))
        {
             $destination = 'uploads/image3/'.$candidate -> picture;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }

            $file = $request->file('picture_edit');
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("uploads/image3/"),$imageName);
            $candidate->picture = $imageName;

        }


        $candidate->update();

        

        return redirect()->route('candidate-index')->with('update','Candidate Added Successfully');
    }

    public function delete(Request $request)
    {
       
         $candidate = Candidate::find($request->deleteid);

        $destination = 'uploads/image3/'.$candidate -> picture;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $candidate -> delete();
        return redirect()->route('candidate-index')->with('delete','Candidate Added Successfully');
    }


    public function deleteAll()
    {
         
        File::cleanDirectory('uploads/image3/');
        DB::table('candidates')->delete();
        return redirect()->route('candidate-index')->with('deleteAll','Candidate Added Successfully');
    }
}
