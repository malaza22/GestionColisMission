<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id'=>'PRODUIT-0001',
            'agencies_id' => 'AGENCY-001',
            'name' => 'calendier',
        ]);
        Product::create([
            'id'=>'PRODUIT-0002',
            'agencies_id' => 'AGENCY-001',
            'name' => 'enveloppe ferme',
        ]);
        Product::create([
            'id'=>'PRODUIT-0003',
            'agencies_id' => 'AGENCY-001',
            'name' => 'moto',
        ]);
        Product::create([
            'id'=>'PRODUIT-0004',
            'agencies_id' => 'AGENCY-001',
            'name' => 'voiture',
        ]);
        Product::create([
            'id'=>'PRODUIT-0005',
            'agencies_id' => 'AGENCY-001',
            'name' => 'bordero',
        ]);
        Product::create([
            'id'=>'PRODUIT-0006',
            'agencies_id' => 'AGENCY-001',
            'name' => 'fornuture de bureau',
        ]);
    }
}
