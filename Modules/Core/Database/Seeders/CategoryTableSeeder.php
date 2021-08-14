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
                'name' => 'Chairsyde',
                'description' => 'Project Chairsyde',
                'subcategories' => [
                    [
                        'name' => 'login page',
                        'description' => 'Chairsyde login page'
                    ],
                    [
                        'name' => 'Register page',
                        'description' => 'Chairsyde Register page'
                    ]
                ]
            ],
            [
                'name' => 'Nimbel',
                'description' => 'Project Nimbel',
                'subcategories' => [
                    [
                        'name' => 'login page',
                        'description' => 'Nimbel login page'
                    ],
                    [
                        'name' => 'Register page',
                        'description' => 'Nimbel Register page'
                    ]
                ]
            ],
            [
                'name' => 'Hyre',
                'description' => 'Project Hyre',
                'subcategories' => [
                    [
                        'name' => 'login page',
                        'description' => 'Hyre login page'
                    ],
                    [
                        'name' => 'Register page',
                        'description' => 'Hyre Register page'
                    ]
                ]
            ],
            [
                'name' => 'Classifier',
                'description' => 'Project Classifier',
                'subcategories' => [
                    [
                        'name' => 'login page',
                        'description' => 'Classifier login page'
                    ],
                    [
                        'name' => 'Register page',
                        'description' => 'Classifier Register page'
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
