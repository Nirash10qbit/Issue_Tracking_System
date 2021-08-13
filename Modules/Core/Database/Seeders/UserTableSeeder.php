<?php

namespace Modules\Core\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@itsystem.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('10qbit<2021>'),
                'remember_token' => 'basic_token',
            ],
            [
                'name' => 'Nirash',
                'email' => 'nirash@itsystem.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('10qbit<2021>'),
                'remember_token' => 'basic_token',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => $user['email_verified_at'],
                'password' => $user['password'],
                'remember_token' => $user['remember_token']
            ]);
        }
    }
}
