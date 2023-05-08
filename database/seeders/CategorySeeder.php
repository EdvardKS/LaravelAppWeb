<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  1 Menu
     *  2 Aperitivo
     *  3 Rustidera
     *  4 Ensaladilla
     *  5 Paellas
     *  6 Principal
     *  7 Brasas
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => 'Menús',
                'description' => 'Tenemos menús! Echa un vistazo y encárganos.',
                'image' => 'categoria_menu',
            ],
            [
                'name' => 'Aperitivo',
                'description' => 'Ojea todos nuestros aperitivos! Será por variedad...',
                'image' => 'categoria_aperitivo',
            ],
            [
                'name' => 'Rustidera',
                'description' => 'Tu Rustidera bajo encargo, mira lo que te ofrecemos.',
                'image' => 'categoria_rustidera',
            ],
            [
                'name' => 'Ensaladillas',
                'description' => 'Lo más refrescante de la comarca en un solo lugar.',
                'image' => 'categoria_ensaladilla',
            ],
            [
                'name' => 'Paellas',
                'description' => 'Las paellas con las mejores criticas, echa un vistazo a nuestra variedad.',
                'image' => 'categoria_paella',
            ],
            [
                'name' => 'Principal',
                'description' => 'Y para usar el tenedor te ofrecemos...',
                'image' => 'categoria_principal',
            ],
            [
                'name' => 'Brasas',
                'description' => 'A la Brasa! Sí, en nuestro horno de leña...',
                'image' => 'categoria_brasas',
            ],
            [
                'id' => 1997,
                'name' => 'Sin categoría',
                'description' => null,
                'image' => null,
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
