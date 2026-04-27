<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerseSeeder extends Seeder
{
    public function run(): void
    {
        $verses = [
            ['Jean 3:16', 'Car Dieu a tant aimé le monde qu\'il a donné son Fils unique...'],
            ['Psaume 23:1', 'L\'Éternel est mon berger : je ne manquerai de rien.'],
            ['Matthieu 5:3', 'Heureux les pauvres en esprit, car le royaume des cieux est à eux !'],
            ['Romains 8:28', 'Toutes choses concourent au bien de ceux qui aiment Dieu.'],
            ['Philippiens 4:13', 'Je puis tout par celui qui me fortifie.'],
            ['Jérémie 29:11', 'Je connais les projets que j\'ai formés sur vous, dit l\'Éternel.'],
            ['Proverbes 3:5', 'Confie-toi en l\'Éternel de tout ton cœur.'],
            ['Ésaïe 41:10', 'Ne crains rien, car je suis avec toi.'],
            ['1 Corinthiens 13:4', 'L\'amour est patient, il est plein de bonté.'],
            ['Matthieu 11:28', 'Venez à moi, vous tous qui êtes fatigués et chargés.'],
        ];

        foreach (range(0, 29) as $i) {
            $v = $verses[$i % count($verses)];
            DB::table('verses')->insert([
                'reference' => $v[0],
                'content' => $v[1],
                'display_date' => now()->addDays($i)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
