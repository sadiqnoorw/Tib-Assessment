<?php

namespace App\Repositories\Eloquent;

use App\Models\Patient;
use App\Repositories\Interfaces\PatientRepositoryInterface;

class PatientRepository implements PatientRepositoryInterface
{
    public function all()
    {
        return Patient::with('medicines')->get();
    }

    public function find($id)
    {
        return Patient::with('medicines')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Patient::create($data);
    }

    public function update($id, array $data)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($data);
        return $patient;
    }

    public function delete($id)
    {
        return Patient::destroy($id);
    }

    public function getFemalesAdultsWith8pmMeds()
    {
        return $this->getByGenderAndAgeAndTime('female', false, '8pm');
    }

    public function getMaleInfantsWith8amMeds()
    {
        return $this->getByGenderAndAgeAndTime('male', true, '8am');
    }

    public function getByGenderAndAgeAndTime($gender, $isInfant, $time)
    {
//         $query = Patient::where('gender', $gender)
//     ->where('is_infant', $isInfant)
//     ->whereHas('medicines', function ($query) use ($time, $isInfant) {
//         $query->whereHas('medicineIntakes', function ($q) use ($time, $isInfant) {
//             $q->whereJsonContains('intake_time', $time);

//             if ($isInfant) {
//                 $q->where('usable_for_infants', true);
//             }
//         });
//     })
//     ->toSql();

// dd($query);

return Patient::where('gender', $gender)
->where('is_infant', $isInfant)
->whereHas('medicines', function ($query) use ($time, $isInfant) {
    $query->whereHas('medicineIntakes', function ($q) use ($time) {
        // Use json_contains with proper syntax
        $q->whereJsonContains('intake_time', $time);
    });

    if ($isInfant) {
        $query->where('medicine_intakes.usable_for_infants', true);
    }
})
->with(['medicines' => function ($query) use ($time, $isInfant) {
    $query->whereJsonContains('intake_time', $time);

    if ($isInfant) {
        $query->where('medicine_intakes.usable_for_infants', true);
    }
}])
->get();
    }

}
