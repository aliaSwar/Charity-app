<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'slug'
    ];
    /**
     * Get the category for the entry.
     */
    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }
}
