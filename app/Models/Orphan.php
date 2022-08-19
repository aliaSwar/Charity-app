<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'person_id', 'sponsor_id', 'number_person', 'mother_is_ok', 'salary_month', 'salary_year', 'begin_date', 'end_date'];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
