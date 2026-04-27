<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SermonSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['L\'amour du prochain', 'Père Jean', 'dQw4w9WgXcQ'],
            ['La foi qui sauve', 'Père Pierre', 'dQw4w9WgXcQ'],
            ['Vivre l\'évangile', 'Père Marc', 'dQw4w9WgXcQ'],
            ['La prière quotidienne', 'Père Paul', 'dQw4w9WgXcQ'],
            ['Le pardon', 'Père Luc', 'dQw4w9WgXcQ'],
        ];

        foreach ($items as $i => [$title, $preacher, $yt]) {
            DB::table('sermons')->insert([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . ($i + 1),
                'description' => "Homélie sur {$title}.",
                'type' => 'video',
                'youtube_id' => $yt,
                'preacher' => $preacher,
                'preached_at' => now()->subWeeks($i),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
