<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = ['category_id', 'title', 'available', 'released_at', 'bought_at', 'created_at', 'updated_at'];

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'movie_id', 'id');
    }
}
