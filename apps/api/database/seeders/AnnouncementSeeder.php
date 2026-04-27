<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@church-platform.local')->first();
        if (! $admin) return;

        $items = [
            ['Messe de Noël', 'liturgie', 'published'],
            ['Retraite paroissiale', 'evenement', 'published'],
            ['Catéchèse 2025', 'formation', 'published'],
            ['Vente de charité', 'caritatif', 'published'],
            ['Nouveau curé', 'annonce', 'published'],
            ['Pèlerinage à Yamoussoukro', 'evenement', 'draft'],
            ['Chorale — recrutement', 'communaute', 'draft'],
            ['Fermeture estivale', 'info', 'archived'],
            ['Confessions de l\'Avent', 'liturgie', 'published'],
            ['Don pour la toiture', 'caritatif', 'published'],
        ];

        foreach ($items as $i => [$title, $cat, $status]) {
            DB::table('announcements')->insert([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . ($i + 1),
                'content' => "Contenu de l'annonce: {$title}.",
                'category' => $cat,
                'status' => $status,
                'published_at' => $status === 'published' ? now()->subDays($i) : null,
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
