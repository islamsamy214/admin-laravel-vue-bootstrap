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
        return $this->belongsToMany(Team::class,'rounds_teams')->withPivot(['rate', 'role_rates', 'is_presentation', 'opening_rate', 'probing_rate', 'delivering_rate', 'objection_rate', 'closing_rate', 'product_rate']);
    } // end of teams relationship
}
