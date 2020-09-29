<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $filable = ['name', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
