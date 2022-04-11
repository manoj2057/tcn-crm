<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'role_name' => 'superadmin'
        ]);

        Role::create([
            'role_name' => 'administrator'
        ]);

        Role::create([
            'role_name' => 'employee'
        ]);
    }
}
