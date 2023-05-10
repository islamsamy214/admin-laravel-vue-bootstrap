<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'hero_image_url',
    ]; // end $appends

    public function getHeroImageUrlAttribute()
    {
        return $this->hero_image ? asset($this->hero_image) : null;
    } // end getHeroImageUrlAttribute
}
