<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birthday', 'health_status', 'academic_level', 'entry_id', 'gender'];

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
}
