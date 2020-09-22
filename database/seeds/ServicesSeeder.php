<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'id'=>'SERVICE-0001',
            'agencies_id' => 'AGENCY-001',
            'name' => 'DAF(directeur d\'administration financier)',
        ]);
        Service::create([
            'id'=>'SERVICE-0002',
            'agencies_id' => 'AGENCY-001',
            'name' => 'D0(directeur operationel)',
        ]);
        Service::create([
            'id'=>'SERVICE-0003',
            'agencies_id' => 'AGENCY-001',
            'name' => 'DAU(Inspecteur)',
        ]);
        Service::create([
            'id'=>'SERVICE-0004',
            'agencies_id' => 'AGENCY-001',
            'name' => 'DDE(directeur des engagement (credit)',
        ]);
        Service::create([
            'id'=>'SERVICE-0005',
            'agencies_id' => 'AGENCY-001',
            'name' => 'caisse feminine',
        ]);
        Service::create([
            'id'=>'SERVICE-0006',
            'agencies_id' => 'AGENCY-001',
            'name' => 'DG(directeur géneral)',
        ]);
    }
}
