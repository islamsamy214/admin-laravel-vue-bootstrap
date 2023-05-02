<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path', 'rate'];

    public function getRateAttribute()
    {
        if ($this->roles->count() > 0) {
            $this->load('roles');
            return $this->roles->sum('rate') / $this->roles->count();
        }
        return 0;
    } // end of rate attribute

    public function getImagePathAttribute()
    {
        return asset($this->image);
    } //end of retreving image directly

    public function round()
    {
        return $this->hasOne(Round::class);
    } // end of round relationship

    public function roles()
    {
        return $this->hasMany(Role::class);
    } // end of roles relationship

    public function users()
    {
        return $this->hasMany(User::class);
    } // end of users relationship
}
