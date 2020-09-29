<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body','category_id'];

    public function category()
    {
        // kalau relasinya menggunkan nama lain tulis di parameter
        // return $this->belongsTo(Category::class),'suvject';
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->BelongsToMany(Tag::class);
    }

    // public function getRouteKeyname()
    // {
    //     return 'slug';
    // }
}