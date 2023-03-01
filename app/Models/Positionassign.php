<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positionassign extends Model
{
    use HasFactory;

    protected $fillable = ['position_id','voter_id','sample_voter'];
}
