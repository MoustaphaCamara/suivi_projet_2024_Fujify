<?php

namespace Database\Seeders;

use Database\Factories\AnimeFactory;
use Illuminate\Database\Seeder;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimeFactory::new()->count(25)->create();

    }
}
