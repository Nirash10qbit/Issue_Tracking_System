<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            UserTableSeeder::class,
            IssueTableSeeder::class,
            CategoryTableSeeder::class,
            ComentTableSeeder::class,
            IssuCategoryTableSeeder::class,
            IssuSubategoryTableSeeder::class,
            ImageTableSeeder::class
        ]);
    }
}
