<?php

namespace App\Imports;

use App\Models\VoterLogin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VotersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VoterLogin([
            'ismis_id'          => $row[0],
            'fname'             => $row[1],
            'lname'             => $row[2],
            'course_section_id' => $row[3],
            'status_id'         => $row[4],
        ]);
    }
}
