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
    /**
     * The paper that belong to the entry mdical.
     */
    public function mdical_entries()
    {
        return $this->belongsToMany(Mdical_entry::class);
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
