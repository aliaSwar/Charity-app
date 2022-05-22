<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;
    protected $softDelete = true;
    protected $fillable = [
        'deleted_at', 'diwan_num', 'registration_num', 'smartCard_num', 'phone_num', 'entry_date', 'entry_date', 'renewal_date', 'finshed_date', 'family_num', 'salary_charity', 'notes',  'id_category', 'id_status', 'all_orphan'
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
    public function people()
    {
        return $this->hasMany(Entry::class);
    }
}
