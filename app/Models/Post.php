<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];

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

    // idealnya

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getRouteKeyname()
    // {
    //     return 'slug';
    // }
}
