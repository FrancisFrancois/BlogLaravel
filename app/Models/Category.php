<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relation plusieurs Post appartiennent à la Category
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
