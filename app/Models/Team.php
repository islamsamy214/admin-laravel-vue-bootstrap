<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path', 'round_rate', 'over_all_rate'];

    public function getRoundRateAttribute()
    {
        if ($this->roles->count() > 0) {
            $this->load('roles');
            return $this->roles->sum('round_rate') / $this->roles->count();
        }
        return 0;
    } // end of rate attribute

    public function getOverAllRateAttribute()
    {
        if ($this->rounds->count() > 0) {
            $rounds = $this->rounds;
            $rate = 0;
            foreach ($rounds as $round) {
                $rate += $round->pivot->rate;
            }
            return $rate / $rounds->count();
        }
        return 0;
    } // end of rate attribute

    public function getImagePathAttribute()
    {
        return asset($this->image);
    } //end of retreving image directly

    public function rounds()
    {
        return $this->belongsToMany(Round::class, 'rounds_teams')->withPivot('rate');
    } // end of rounds relationship

    public function roles()
    {
        return $this->hasMany(Role::class);
    } // end of roles relationship

    public function users()
    {
        return $this->hasMany(User::class);
    } // end of users relationship
}
