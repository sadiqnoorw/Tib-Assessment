<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'name' => 'Aspirin',
            'intake_frequency' => 1, // 1 time a day
            'usable_for_infants' => false
        ]);

        Medicine::create([
            'name' => 'Paracetamol',
            'intake_frequency' => 2, // 2 times a day
            'usable_for_infants' => true
        ]);

        Medicine::create([
            'name' => 'Ibuprofen',
            'intake_frequency' => 3, // 3 times a day
            'usable_for_infants' => false
        ]);
    }
}
