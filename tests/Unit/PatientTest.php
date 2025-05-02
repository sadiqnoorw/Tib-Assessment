<?php
// tests/Unit/PatientTest.php

namespace Tests\Unit;

use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_patient()
    {
        // Arrange: Data for the patient
        $data = [
            'name' => 'Jane Doe',
            'gender' => 'female',
            'age_group' => 'adult',
            'is_infant' => 0,
        ];

        // Act: Create patient using mass assignment
        $patient = Patient::create($data);

        // Assert: Check if patient is created correctly
        $this->assertDatabaseHas('patients', $data); // Verifies if the record exists in DB
        $this->assertEquals('Jane Doe', $patient->name);
        $this->assertEquals('female', $patient->gender);
    }

    /** @test */
    public function it_can_associate_medicine_with_patient()
    {
        // Arrange: Create a patient and medicine
        $patient = Patient::create([
            'name' => 'Jane Doe',
            'gender' => 'female',
            'age_group' => 'adult',
            'is_infant' => 0,
        ]);

        $medicine = Medicine::create([
            'name' => 'Paracetamol',
            'intake_frequency' => 2,
            'usable_for_infants' => true,
        ]);

        // Act: Attach the medicine to the patient
        $patient->medicines()->attach($medicine, ['intake_time' => json_encode(['8pm'])]);

        // Assert: Check if the medicine was associated
        $this->assertTrue($patient->medicines->contains($medicine));
        $this->assertEquals(['8pm'], json_decode($patient->medicines()->first()->pivot->intake_time));
    }

    /** @test */
public function it_does_not_associate_medicine_with_non_existent_patient()
{
    // Arrange: Create a medicine
    $medicine = Medicine::create([
        'name' => 'Paracetamol',
        'intake_frequency' => 2,
        'usable_for_infants' => true,
    ]);

    // Act: Try attaching to a non-existent patient
    $nonExistentPatientId = 999; // Assuming this ID does not exist
    try {
        $medicine->patients()->attach($nonExistentPatientId, ['intake_time' => json_encode(['8pm'])]);
        $result = true;
    } catch (\Exception $e) {
        $result = false;
    }

    // Assert: The association should not happen
    $this->assertFalse($result);
}

}
