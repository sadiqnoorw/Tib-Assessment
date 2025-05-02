<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'intake_frequency',
        'usable_for_infants',
    ];
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
