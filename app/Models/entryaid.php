<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entryaid extends Model
{
    use HasFactory;
   protected $table = 'aid_entry';
    protected $fillable = [
        'id', 'aid_id', 'entry_id'
    ];
}
