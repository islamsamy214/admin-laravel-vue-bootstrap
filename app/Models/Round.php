<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teams()
    {
        return $this->belongsToMany(Team::class,'rounds_teams')->withPivot(['rate', 'role_rates']);
    } // end of teams relationship
}
