<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicineIntake;
use App\Models\Patient;
use App\Models\Medicine;


class MedicineIntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient1 = Patient::where('name', 'Jane Doe')->first();
        $patient2 = Patient::where('name', 'John Doe')->first();
        $patient3 = Patient::where('name', 'Alice Smith')->first();
        $patient4 = Patient::where('name', 'Bob Johnson')->first();

        // Get medicines
        $aspirin = Medicine::where('name', 'Aspirin')->first();
        $paracetamol = Medicine::where('name', 'Paracetamol')->first();
        $ibuprofen = Medicine::where('name', 'Ibuprofen')->first();

        // Attach medicine intakes for Jane Doe (Adult Female)
        $patient1->medicines()->attach($aspirin->id, [
            'intake_time' => json_encode(['8am']), // Store as JSON array
            'dosage' => '500mg',
            'usable_for_infants' => false
        ]);

        $patient1->medicines()->attach($paracetamol->id, [
            'intake_time' => json_encode(['8pm']), // Store as JSON array
            'dosage' => '250mg',
            'usable_for_infants' => false
        ]);

        // Attach medicine intakes for John Doe (Infant Male)
        $patient2->medicines()->attach($paracetamol->id, [
            'intake_time' => json_encode(['8am']), // Store as JSON array
            'dosage' => '100mg',
            'usable_for_infants' => true
        ]);

        $patient2->medicines()->attach($ibuprofen->id, [
            'intake_time' => json_encode(['8pm']), // Store as JSON array
            'dosage' => '150mg',
            'usable_for_infants' => true
        ]);

        // Attach medicine intakes for Alice Smith (Adult Female)
        $patient3->medicines()->attach($aspirin->id, [
            'intake_time' => json_encode(['8am']), // Store as JSON array
            'dosage' => '500mg',
            'usable_for_infants' => false
        ]);

        $patient3->medicines()->attach($ibuprofen->id, [
            'intake_time' => json_encode(['8pm']), // Store as JSON array
            'dosage' => '400mg',
            'usable_for_infants' => false
        ]);

        // Attach medicine intakes for Bob Johnson (Infant Male)
        $patient4->medicines()->attach($paracetamol->id, [
            'intake_time' => json_encode(['8am']), // Store as JSON array
            'dosage' => '100mg',
            'usable_for_infants' => true
        ]);
    }
}
