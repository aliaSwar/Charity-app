<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'slug'
    ];
    /**
     * Get the status for the entry.
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
