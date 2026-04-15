<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'length',
        'release_date',
        'genre_id',
        'publisher_id'
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
