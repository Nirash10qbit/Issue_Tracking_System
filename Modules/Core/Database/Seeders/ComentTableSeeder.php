<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Comment;

class ComentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $comments = [
            [
                'issue_id' => 1,
                'body' => 'It have one error',
            ],
            [
                'issue_id' => 1,
                'body' => 'This error must be fixed',
            ],
            [
                'issue_id' => 2,
                'body' => 'This error fixed',
            ],
        ];

        foreach($comments as $comment){
            Comment::create([
                'issue_id' => $comment['issue_id'],
                'body' => $comment['body'],
            ]);
        }
    }
}
