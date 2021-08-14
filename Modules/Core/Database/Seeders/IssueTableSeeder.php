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
              'title' =>'Bug',
              'body' => 'A problem ',
                'uuid' => '7a342ca2-e79f-528e-6302-8f901b0b6888',
                'slug' => 'Issues 01'
            ],
            [
                'title' =>'Epic',
                'body' => 'gh issue epic desc',
                'uuid' => '396e0c46-09e4-4b19-97db-bd423774a4b3',
                'slug' => 'Issues 02'
            ],
            [
                'title' =>'Story',
                'body' => 'gh issue story desc ',
                'uuid' => '403aa1ab-9f70-44ec-bc08-5d5ac56bd8a5',
                'slug' => 'Issues 03'
            ],
            [
                'title' =>'Task',
                'body' => 'A task that  ',
                'uuid' => 'f4d7d31f-fa83-431a-b30c-3e6cc37cc6ee',
                'slug' => 'Issues 04'
            ],
            [
                'title' =>'Sub-task',
                'body' => 'The sub task of the issue',
                'uuid' => 'f4d7d31f-fa83-431a-b30c-3e6cc376ee',
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
