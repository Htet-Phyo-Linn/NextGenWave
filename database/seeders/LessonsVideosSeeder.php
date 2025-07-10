<?php
namespace Database\Seeders;

use App\Models\Courses;
use App\Models\Lessons;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LessonsVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// Get available course IDs
        $courseIds = Courses::pluck('id')->toArray();

        // Ensure there are courses to attach lessons to
        if (empty($courseIds)) {
            echo "No courses found. Please run CourseSeeder first.\n";
            return;
        }

        for ($i = 1; $i <= 40; $i++) {
            Lessons::create([
                'course_id'  => $courseIds[array_rand($courseIds)],
                'title'      => 'Lesson ' . $i . ' - ' . Str::title(Str::random(8)),
                'content'    => 'This is the content for lesson ' . $i . '. ' . Str::random(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
