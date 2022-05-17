<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalUpdate extends Model
{
    use HasFactory;
    protected $fillable = ['event', 'name_number', 'entry_id', 'image', 'notes'];

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
    public function getFeaturedImageAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset("storage/{$value}");
    }
}
