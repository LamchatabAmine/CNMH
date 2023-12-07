<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'name' => 'member',
            'email' => 'member@solicode.co',
            'password' => bcrypt('member'),
        ])->assignRole('member');
    }
}
