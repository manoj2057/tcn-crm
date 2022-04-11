<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lead::create([
            'name'=>'kamal pokharel',
            'source_id' => 1,
            'admin_id' => 1,
            'status'=>'New',
        ]);
    }
}
