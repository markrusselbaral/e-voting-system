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
            'ismis_id'          => $row[1],
            'fname'             => $row[2],
            'lname'             => $row[3],
            'course_section_id' => $row[4],
            'status_id'         => $row[5],
            'department_id'     => $row[6],
            
            'college_id'        => $row[7],
        ]);
    }
}
