<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoterLogin extends Model
{
    use HasFactory;
    protected $fillable = ['ismis_id','fname','lname','course_section_id','status_id'];
}
