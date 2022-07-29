<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'text', 'image'];
    /*
    *******store image *****************
    */
    public function getFeaturedImageAttribute($value)
    {
        return asset("storage/{$value}");
    }
}
