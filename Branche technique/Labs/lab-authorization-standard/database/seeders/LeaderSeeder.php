<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeaderSeeder extends Seeder
{

    public function run(): void
    {
        $user = User::create([
            'name' => 'leader',
            'email' => 'leader@solicode.co',
            'password' => bcrypt('leader'),
        ]);
        $user->assignRole('member', 'leader');
    }
}
