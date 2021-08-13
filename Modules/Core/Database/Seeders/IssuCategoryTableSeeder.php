<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\IssueCategory;

class IssuCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       $issue_categories = [
           [
               'issue_id' =>1,
               'category_id' =>1,
           ],
           [
               'issue_id' =>1,
               'category_id' =>2
           ],
           [
               'issue_id' =>2,
               'category_id' =>1
           ],
           [
               'issue_id' =>2,
               'category_id' =>2
           ],
       ];

       foreach ($issue_categories as $issue_category){
           IssueCategory::create([
               'issue_id' =>$issue_category['issue_id'],
               'category_id' => $issue_category['category_id']
           ]);
       }
    }
}
