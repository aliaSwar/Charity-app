<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification_paper extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    /**
     * The paper that belong to the entry.
     */
    public function entries()
    {
        return $this->belongsToMany(Entry::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFeaturedImageAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset("storage/{$value}");
    }
}
