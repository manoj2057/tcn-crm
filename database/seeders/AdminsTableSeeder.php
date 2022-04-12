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
            'user_code' => 'TCN-02',
            'name' => 'Manoj Pokharel',
            'email' => 'manoj@gmail.com',
            'password' => bcrypt('password'),
        ]);  
        Admin::create([
            'role_id' => 2,
            'user_code' => 'TCN-03',
            'name' => 'kamal Pokharel',
            'email' => 'kamal@gmail.com',
            'password' => bcrypt('password'),
        ]);  

    }
}
