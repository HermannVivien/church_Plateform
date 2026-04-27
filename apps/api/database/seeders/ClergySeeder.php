<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClergySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Mgr Jean-Pierre Kouassi', 'eveque', 'Évêque du diocèse'],
            ['Père François Adou', 'pretre', 'Curé de la paroisse'],
            ['Diacre Marc Bamba', 'diacre', 'Diacre permanent'],
        ];

        foreach ($items as $i => [$name, $role, $bio]) {
            DB::table('clergy')->insert([
                'name' => $name,
                'role' => $role,
                'bio' => $bio,
                'parish' => 'Cathédrale Saint-Paul',
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
