<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['category', 'created_at', 'updated_at'];

    public function movies()
    {
        return $this->hasMany(Movie::class, 'category_id', 'id');
    }
}
