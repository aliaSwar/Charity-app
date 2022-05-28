<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'slug'];
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
