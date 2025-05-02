<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_intakes', 'patient_id', 'medicine_id')
            ->withPivot('intake_time', 'dosage', 'usable_for_infants');
    }
}
