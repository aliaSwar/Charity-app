<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'phone', 'user_id'];
    public function paids()
    {
        return $this->hasMany(Paid::class);
    }
    public function orphans()
    {
        return $this->belongsToMany(Orphan::class);
    }
}
