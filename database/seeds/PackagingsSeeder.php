<?php

use App\Models\Packaging;
use Illuminate\Database\Seeder;

class PackagingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packaging::create([
            'id'=>'PACKAGING-00001',
            'name' => 'Carton',
        ]);
        Packaging::create([
            'id'=>'PACKAGING-00002',
            'name' => 'Gony',
        ]);
    }
}
