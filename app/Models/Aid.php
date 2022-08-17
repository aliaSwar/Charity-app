<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aid extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'image', 'name', 'notes'];

    /**
     * The aid that belong to the entry.
     */
    public function entries()
    {

        return $this->belongsToMany('App\Models\Entry', 'aid_entry');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFeaturedImageAttribute($value)
    {
        return asset("storage/{$value}");
    }
}
