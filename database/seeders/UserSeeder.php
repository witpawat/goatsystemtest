<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'fname' => 'Admin',
                'lname' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('admin_12345'),
                'farmName' => 'FarmAdmin'
            ],
            [
                'fname' => 'User',
                'lname' => 'User',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('user_12345'),
                'farmName' => 'FarmUser'
            ]
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
