<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'diwan_num', 'registration_num', 'smartCard_num', 'phone_num', 'husband_id_num', 'wife_id_num', 'entry_date', 'entry_date', 'renewal_date', 'finshed_date', 'husband_birthday', 'wife_birthday', 'family_name', 'address', 'husband_name', 'wife_name', 'husband_health_status', 'wife_health_status', 'wife_work', 'husband_work', 'children_num', 'salary_charity', 'notes', 'family_husband_status', 'family_wife_status', 'id_category', 'id_status'
    ];
    /**
     * The entry that belong to the category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * The entry that belong to the status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    /**
     * The entry that belong to the aid.
     */
    public function aids()
    {
        return $this->belongsToMany(Aid::class);
    }
    /**
     * The entry that belong to  identification_papers .
     */
    public function identification_papers()
    {
        return $this->belongsToMany(Identification_paper::class);
    }
    /**
     * Get the children  for the entry family.
     */
    public function children()
    {
        return $this->hasMany(Entry::class);
    }
    /**
     * Get the additional_updates for the entry .
     */
    public function additional_updates()
    {
        return $this->hasMany(additional_updates::class);
    }
}
