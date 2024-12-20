<?php

namespace Database\Seeders;

use App\Models\Pasty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasty::factory()->count(20)->create();
    }
}
