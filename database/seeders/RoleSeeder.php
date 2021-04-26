<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //
        $role = Role::create(['guard_name' => 'api','name' => 'admin']);
        $role = Role::create(['guard_name' => 'api','name' => 'super-admin']);
        $role = Role::create(['guard_name' => 'api','name' => 'client']);
        $role = Role::create(['guard_name' => 'api','name' => 'tenant']);
    
    }
}
