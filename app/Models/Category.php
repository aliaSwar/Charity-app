<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'slug'];
    /**
     * Get the category for the entry.
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
    public function getRouteName()
    {
        return 'slug';
    }
}
