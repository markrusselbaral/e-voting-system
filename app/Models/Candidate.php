<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['ismis_id','fname','lname','course_section','department','college','position_id','partylist','picture'];


    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
