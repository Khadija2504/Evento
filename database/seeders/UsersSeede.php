<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'testingName',
            'email' => 'email@test.com',
            'identifiant_unique' => 'testingName#1234',
            'role' => 'organisateur',
            'password' => bcrypt('123456789'),
        ]);
        $user->assignRole('organisateur');
    }
}
