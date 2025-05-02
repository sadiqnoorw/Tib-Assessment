<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'age_group',
        'is_infant',
    ];
    
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_intakes', 'patient_id', 'medicine_id')
            ->withPivot('intake_time', 'dosage', 'usable_for_infants');
    }
}
