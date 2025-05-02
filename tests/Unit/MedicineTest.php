<?php

namespace Tests\Unit;

use App\Models\Medicine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedicineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_medicine()
    {
        // Arrange: Data for the medicine
        $data = [
            'name' => 'Paracetamol',
            'intake_frequency' => 2,
            'usable_for_infants' => true,
        ];

        // Act: Create medicine using mass assignment
        $medicine = Medicine::create($data);

        // Assert: Check if medicine is created correctly
        $this->assertDatabaseHas('medicines', $data); // Verifies if the record exists in DB
        $this->assertEquals('Paracetamol', $medicine->name);
        $this->assertEquals(2, $medicine->intake_frequency);
        $this->assertTrue($medicine->usable_for_infants);
    }

    /** @test */
    public function it_requires_name_to_create_medicine()
    {
        // Act: Attempt to create medicine without a name
        $this->expectException(\Illuminate\Database\QueryException::class);

    Medicine::create([
        'intake_frequency' => 2,
        'usable_for_infants' => true,
    ]);
    }
}
