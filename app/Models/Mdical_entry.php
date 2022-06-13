<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mdical_entry extends Model
{
    use HasFactory;
    protected $fillable = ['notes', 'papers', 'phone', 'husband_name', 'wife_name', 'whos', 'name_recipient', 'birthday', 'illness', 'address', 'session_decision'];
    /**
     * The entry that belong to  identification_papers .
     */
    public function identification_papers()
    {
        return $this->belongsToMany(Identification_paper::class);
    }
}
