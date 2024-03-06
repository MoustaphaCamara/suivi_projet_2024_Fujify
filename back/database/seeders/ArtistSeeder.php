<?php

namespace Database\Seeders;

use Database\Factories\ArtistFactory;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArtistFactory::new()->count(25)->create();
    }
}
