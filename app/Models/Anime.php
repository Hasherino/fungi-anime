<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'english_name',
        'japanese_name',
        'thumbnail',
        'description',
        'premiere',
        'episode_count',
        'age_restriction',
        'rating',
        'popularity',
        'score',
        'nsfw',
        'kitsu_id',
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function genres() {
        return $this->hasMany(Genre::class);
    }
}
