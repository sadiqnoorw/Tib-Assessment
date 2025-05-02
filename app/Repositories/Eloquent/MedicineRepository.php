<?php

namespace App\Repositories\Eloquent;

use App\Models\Patient;
use App\Repositories\Interfaces\MedicineRepositoryInterface;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function all()
    {
        return Patient::all();
    }

    public function find($id)
    {
        return Patient::findOrFail($id);
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
        return Patient::where('gender', 'female')
            ->where('age_group', 'adult')
            ->whereHas('medicineIntakes', fn($query) =>
                $query->where('intake_time', '20:00:00')
            )->with('medicineIntakes.medicine')->get();
    }

    public function getMaleInfantsWith8amMeds()
    {
        return Patient::where('gender', 'male')
            ->where('age_group', 'infant')
            ->whereHas('medicineIntakes', fn($query) =>
                $query->where('intake_time', '08:00:00')
            )->with('medicineIntakes.medicine')->get();
    }
}

