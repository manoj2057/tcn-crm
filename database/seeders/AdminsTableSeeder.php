<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'role_id' => 1,
            'user_code' => 'TCN-01',
            'name' => 'Manoj Pokharel',
            'email' => 'manoj@gmail.com',
            'password' => bcrypt('password'),
        ]);

    }
}
