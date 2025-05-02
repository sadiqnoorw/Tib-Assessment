<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'medicine_intakes')
                    ->withPivot(['intake_time', 'dosage'])
                    ->withTimestamps();
    }
    // Define the relationship to MedicineIntake
    public function medicineIntakes()
    {
        return $this->hasMany(MedicineIntake::class);
    }
    
}
