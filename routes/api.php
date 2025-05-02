<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PatientApiController;

Route::prefix('patients')->group(function () {
    Route::get('female-adults-8pm', [PatientApiController::class, 'femaleAdultsWith8pmMeds']);
    Route::get('male-infants-8am', [PatientApiController::class, 'maleInfantsWith8amMeds']);
    Route::get('{gender}/{isInfant}/{time}', [PatientApiController::class, 'getByParams']);
});