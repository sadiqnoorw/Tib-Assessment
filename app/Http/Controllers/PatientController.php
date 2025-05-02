<?php
namespace App\Http\Controllers;

use App\Repositories\Interfaces\PatientRepositoryInterface;

class PatientController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    // Display female adults with 8pm medications
    public function showFemaleAdultsWith8pmMeds()
    {
        $patients = $this->patientRepository->getFemalesAdultsWith8pmMeds();
        return view('patients.female_adults_8pm', compact('patients'));
    }

    // Display male infants with 8am medications
    public function showMaleInfantsWith8amMeds()
    {
        $patients = $this->patientRepository->getMaleInfantsWith8amMeds();
        
        return view('patients.male_infants_8am', compact('patients'));
    }
    
}
