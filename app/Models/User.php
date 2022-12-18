<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'birthday',
        'email',
        'email_confirmed',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function genders() {
        return $this->hasMany(Gender::class);
    }

    public function animes() {
        return $this->belongsToMany(Anime::class)->withTimestamps();
    }

    public function threads() {
        return $this->hasMany(Thread::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
