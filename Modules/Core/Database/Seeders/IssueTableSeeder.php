<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Issue;

class IssueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $issues = [
            [
              'title' =>'Issues 01',
              'body' => 'Issues 01 ',
                'uuid' => 1,
                'slug' => 'Issues 01'
            ],
            [
                'title' =>'Issues 02',
                'body' => 'Issues 02 ',
                'uuid' => 2,
                'slug' => 'Issues 02'
            ],
            [
                'title' =>'Issues 03',
                'body' => 'Issues 03 ',
                'uuid' => 1,
                'slug' => 'Issues 03'
            ],
            [
                'title' =>'Issues 04',
                'body' => 'Issues 04 ',
                'uuid' => 1,
                'slug' => 'Issues 04'
            ],
        ];

        foreach($issues as $issue){
            Issue::create([
               'title' =>$issue['title'],
                'body' =>$issue['body'],
                'uuid' =>$issue['uuid'],
                'slug' => $issue['slug']
            ]);
        }
    }
}
