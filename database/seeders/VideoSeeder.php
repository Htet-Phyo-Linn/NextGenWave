<?php
namespace Database\Seeders;

use App\Models\Lessons;
use App\Models\Videos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessonIds = Lessons::pluck('id')->toArray();

        if (empty($lessonIds)) {
            echo "❗ No lessons found. Please run LessonSeeder first.\n";
            return;
        }

        for ($i = 1; $i <= 50; $i++) {
            Videos::create([
                'lesson_id'  => $lessonIds[array_rand($lessonIds)],
                'title'      => 'Video ' . $i . ' - ' . Str::title(Str::random(6)),
                'video_url'  => 'https://cdn.example.com/videos/' . Str::random(16) . '.mp4',
                'duration'   => rand(60, 900) . 's', // e.g. "300s" = 5 mins
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
