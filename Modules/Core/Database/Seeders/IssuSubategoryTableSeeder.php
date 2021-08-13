<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\IssueSubcategory;

class IssuSubategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $issue_subcategories = [
            [
                'issue_id' =>1,
                'subcategory_id' =>1
            ],
            [
                'issue_id' =>1,
                'subcategory_id' =>2
            ],
            [
                'issue_id' =>2,
                'subcategory_id' =>3
            ],
            [
                'issue_id' =>2,
                'subcategory_id' =>4
            ],
        ];

        foreach ($issue_subcategories as $issue_subcategory){
            IssueSubcategory::create([
                'issue_id' =>$issue_subcategory['issue_id'],
                'subcategory_id' =>$issue_subcategory['subcategory_id']
            ]);
        }
    }
}
