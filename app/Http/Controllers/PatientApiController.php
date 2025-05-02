<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PatientRepositoryInterface;

class PatientApiController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function femaleAdultsWith8pmMeds()
    {
        return response()->json([
            'data' => $this->patientRepository->getFemalesAdultsWith8pmMeds()
        ]);
    }

    public function maleInfantsWith8amMeds()
    {
        return response()->json([
            'data' => $this->patientRepository->getMaleInfantsWith8amMeds()
        ]);
    }

    public function getByParams($gender, $isInfant, $time)
    {
        return response()->json([
            'data' => $this->patientRepository->getByGenderAndAgeAndTime($gender, $isInfant, $time)
        ]);
    }
}
