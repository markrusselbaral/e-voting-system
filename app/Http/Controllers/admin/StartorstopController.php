<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Startelection;

class StartorstopController extends Controller
{
    public function change()
    {
        
        $startorstop = Startelection::select('startorstop')->first();
        if($startorstop['startorstop'] == '0')
        {
            Startelection::where('startorstop','0')->update([

                'startorstop' => '1'
            ]);
        }

        else{
            Startelection::where('startorstop','1')->update([

                'startorstop' => '0'
            ]);
        }

        return redirect()->back();
    }
}
