<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'image', 'date_paid', 'sposor_id'];
    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
