<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected $morphClass = 'phrase';

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }
}
