<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lead::create([
        'name'=>'facebook',
        ]);
    }
}
