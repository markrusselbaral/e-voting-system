<?php

namespace App\Exports;

use App\Models\VoterLogin;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VoterLogin::all();
    }
}
