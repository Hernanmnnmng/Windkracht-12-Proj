<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonPackage; // ✅ Import the model at the top

class LessonPackageSeeder extends Seeder
{
    public function run(): void
    {
        LessonPackage::insert([
            [
                'name' => 'Privéles',
                'description' => 'Inclusief materiaal, 1 persoon per les, 1 dagdeel',
                'duration_minutes' => 150,
                'price' => 175.00,
                'max_students' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Losse Duo Kiteles',
                'description' => 'Max. 2 personen, incl. materiaal, 1 dagdeel',
                'duration_minutes' => 210,
                'price' => 135.00,
                'max_students' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Duo lespakket (3 lessen)',
                'description' => 'Max. 2 personen, incl. materiaal, 3 dagdelen',
                'duration_minutes' => 630,
                'price' => 375.00,
                'max_students' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Duo lespakket (5 lessen)',
                'description' => 'Max. 2 personen, incl. materiaal, 5 dagdelen',
                'duration_minutes' => 1050,
                'price' => 675.00,
                'max_students' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}