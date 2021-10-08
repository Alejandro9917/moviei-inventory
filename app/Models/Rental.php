<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    protected $fillable = ['movie_id', 'client_id', 'state', 'rented_at', 'secure_date', 'returned_at', 'created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id', 'movie_id');
    }
}
