<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function round()
    {
        return $this->hasOne(Round::class);
    } // end of round relationship

    public function roles()
    {
        return $this->hasMany(Role::class);
    } // end of roles relationship
}