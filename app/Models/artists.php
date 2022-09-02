<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artists extends Model
{
    use HasFactory;
    public function songs()
    {
        return $this->hasMany(Song::class, 'artist_id', 'id');
    }
    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_id', 'id');
    }
}
