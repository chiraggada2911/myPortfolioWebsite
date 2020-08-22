<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call seeders
        $this->call([
            UserSeeder::class,
            HomepageVersionSeeder::class,
            SectionSeeder::class,
        ]);
    }
}
