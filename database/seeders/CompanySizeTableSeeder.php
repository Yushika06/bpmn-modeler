<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_sizes')->insert([
            ['id' => 1, 'name' => 'Small - <100 Employees'],
            ['id' => 2, 'name' => 'Medium - <500 Employees'],
        ]);
    }
}
