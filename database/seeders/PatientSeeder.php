<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'name' => 'Jane Doe',
            'is_infant' => false,
            'gender' => 'female',
            'age_group' => 'adult',
        ]);

        Patient::create([
            'name' => 'John Doe',
            'is_infant' => true,
            'gender' => 'male',
            'age_group' => 'infant',
        ]);

        Patient::create([
            'name' => 'Alice Smith',
            'is_infant' => false,
            'gender' => 'female',
            'age_group' => 'adult',
        ]);

        Patient::create([
            'name' => 'Bob Johnson',
            'is_infant' => true,
            'gender' => 'male',
            'age_group' => 'infant',
        ]);
    }
}
