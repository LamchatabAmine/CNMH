<?php

namespace Database\Seeders;

use PermissionHelper;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        foreach(PermissionHelper::generatePermissions() as $permission) {
            if(Permission::where('name', $permission)->doesntExist()) {
                Permission::create(['name' => $permission]);
            }
        }

        // Get the leader role
        $leader = Role::where('name', 'leader')->first();

        // Get the Permission instances corresponding to the generated permissions
        $permissions = Permission::whereIn('name', PermissionHelper::generatePermissions())->get();

        // Give permissions to the leader role
        $leader->givePermissionTo($permissions);

        // Get the member role
        $member = Role::where('name', 'member')->first();

        $member->givePermissionTo('index-Task', 'searchTask-Task');

    }
}


/* permissions :
    "index-Task"
    "create-Task"
    "store-Task"
    "edit-Task"
    "update-Task"
    "destroy-Task"
    "searchTask-Task"
    "index-Home"
*/
