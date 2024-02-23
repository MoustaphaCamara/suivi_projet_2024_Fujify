<?php

namespace Database\Seeders;

use Database\Factories\SongFactory;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SongFactory::new()->count(25)->create();
    }
}
