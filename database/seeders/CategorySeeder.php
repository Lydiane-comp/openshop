<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'libelle' => 'Matériels Electroniques',
            'description' => 'Ceci est la description de Matériels Electroniques',
        ]);

        Category::create([
            'libelle' => 'Vetements',
            'description' => 'Ceci est la description de Vetements',
        ]);

        Category::create([
            'libelle' => 'Cosmetiques',
            'description' => 'Ceci est la description de Cosmetiques',
        ]);
    }
}
