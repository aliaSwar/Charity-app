<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'user_id'];
    public function paids()
    {
        return $this->hasMany(Paid::class);
    }
    public function orphans()
    {
        return $this->belongsToMany(Orphan::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
