<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public function artist()
    {
        return $this->hasOne(artists::class, 'id', 'artist_id');
    }
    public function songs()
    {
        return $this->hasMany(Song::class, 'album_id', 'id');
    }
}
