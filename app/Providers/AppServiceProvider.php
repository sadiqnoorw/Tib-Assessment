<?php

namespace App\Providers;

use App\Repositories\Eloquent\PatientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\MedicineRepository;
use App\Repositories\Eloquent\MedicineIntakeRepository;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use App\Repositories\Interfaces\MedicineRepositoryInterface;
use App\Repositories\Interfaces\MedicineIntakeRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(MedicineRepositoryInterface::class, MedicineRepository::class);
        $this->app->bind(MedicineIntakeRepositoryInterface::class, MedicineIntakeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
