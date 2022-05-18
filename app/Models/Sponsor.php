<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone', 'email', 'salary', 'id_type'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
