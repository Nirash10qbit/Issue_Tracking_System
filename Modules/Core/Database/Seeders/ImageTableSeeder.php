<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Image;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $images = [
            [
                'imageable_type' => 'image',
                'imageable_id' => 1,
                'size' => 11,
                'path' => 'AWS/path/to/image1',
                'name' => 'Image 1',
                'extension' => 'jpg',
            ],
            [
                'imageable_type' => 'image',
                'imageable_id' => 2,
                'size' => 12,
                'path' => 'AWS/path/to/image2',
                'name' => 'Image 2',
                'extension' => 'jpg',
            ],
            [
                'imageable_type' => 'image',
                'imageable_id' => 3,
                'size' => 13,
                'path' => 'AWS/path/to/image3',
                'name' => 'Image 3',
                'extension' => 'jpg',
            ],
        ];

        foreach($images as $image){
            Image::create([
               'imageable_type' => $image['imageable_type'],
                'imageable_id' => $image['imageable_id'],
                'size' => $image['size'],
                'path' => $image['path'],
                'name' => $image['name'],
                'extension' => $image['extension']
            ]);
        }
    }
}
