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
        $this->call(AgenciesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(PackagingsSeeder::class);
    }
}
