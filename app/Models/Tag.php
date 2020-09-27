<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        // sama saja karena laavel sudah 
        // tahu kalua aturan buat databasenya sesuai
        // return BelongsToMany(Post::class, 'post_tag');
        return $this->BelongsToMany(Post::class);
    }
}