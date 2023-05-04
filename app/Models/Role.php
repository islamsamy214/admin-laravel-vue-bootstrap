<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['round_rate'];

    public function getRoundRateAttribute()
    {
        return ($this->opening_rate + $this->probing_rate + $this->delivering_rate + $this->objection_rate + $this->closing_rate + $this->product_rate) / 6;
    } // end of rate attribute

    public function team()
    {
        return $this->belongsTo(Team::class);
    } // end of team relationship

    public function users()
    {
        return $this->hasMany(User::class);
    } // end of user relationship

    public function round()
    {
        return $this->belongsTo(Round::class);
    } // end of round relationship
}
