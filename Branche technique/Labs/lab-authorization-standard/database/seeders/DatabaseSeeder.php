<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(LeaderSeeder::class);
        $this->call(MemberSeeder::class);
    }
}
