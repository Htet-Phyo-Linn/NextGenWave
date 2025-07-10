<?php
namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 30; $i++) {
            Courses::create([
                'instructor_id' => rand(1, 5), // Adjust based on your instructor user IDs
                'category_id'   => rand(1, 5), // Adjust based on your category IDs
                'title'         => 'Course ' . Str::random(5) . " #$i",
                'description'   => 'This is a sample description for Course #' . $i,
                'price'         => rand(1000, 50000),
                'image'         => 'images/courses/' . Str::random(20) . '.png',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

    }
}
