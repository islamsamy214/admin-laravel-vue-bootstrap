<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $appends = ['image_path'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getImagePathAttribute()
    {
        return asset($this->image);
    } //end of retreving image directly

<<<<<<< HEAD
    public function role()
    {
        return $this->belongsTo(Role::class);
    } // end of role relationship

    public function team()
    {
        return $this->belongsTo(Team::class);
    } // end of team relationship
=======
    public function posts()
    {
        return $this->hasMany(Post::class);
    } //end of posts relation

    public function comments()
    {
        return $this->hasMany(Comment::class);
    } //end of comments relation
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
}
