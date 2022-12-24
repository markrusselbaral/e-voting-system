<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Votes extends Model
{
    use HasFactory;
    protected $fillable = ['voter_id','candidate_id','position_id','check_id'];


    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

}
