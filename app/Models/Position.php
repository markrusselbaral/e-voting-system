<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;
use App\Models\Votes;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['position','position_order'];

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

    public function votes()
    {
        return $this->hasMany(Votes::class);
    }
}
