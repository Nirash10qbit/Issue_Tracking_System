<?php

namespace Modules\Core\Database\Seeders;
use Modules\Core\Entities\Category;
use Modules\Core\Entities\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = [
            [
                'name' => 'Category 01',
                'description' => 'Category 01',
                'subcategories' => [
                    [
                        'name' => 'Sub Category 01',
                        'description' => 'Issues Category 01'
                    ],
                    [
                        'name' => 'Sub Category 02',
                        'description' => 'Issues Category 02'
                    ]
                ]
            ],
            [
                'name' => 'Category 02',
                'description' => 'Category 02',
                'subcategories' => [
                    [
                        'name' => 'Sub Category 03',
                        'description' => 'Issues Category 03'
                    ],
                    [
                        'name' => 'Sub Category 04',
                        'description' => 'Issues Category 04'
                    ]
                ]
            ],
        ];

        foreach ($categories as $category) {
            $category_entity = Category::create([
                    'name' => $category['name'],
                    'description' => $category['description']
                ]);

            foreach ($category['subcategories'] as $subcategory) {
                Subcategory::create([
                    'category_id' => $category_entity->id,
                    'name' => $subcategory['name'],
                    'description' => $subcategory['description']

                ]);
            }
        }
    }
}
