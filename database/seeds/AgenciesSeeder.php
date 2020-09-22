<?php

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::create([
            'id'=>'AGENCY-001',
            'name' => 'UNION',
            'slug' => 'union_toamasina',
            'email'=>'union@gmail.com',
            'phone_number'=>'0000001',
            'location' => 'Toamasina RUE Auganier',
        ]);
        Agency::create([
            'id'=>'AGENCY-002',
            'name' => 'OTIV-FIAVOTANA',
            'slug' => 'fiavotana_toamasina',
            'email'=>'fiavotana@gmail.com',
            'phone_number'=>'0000002',
            'location' => 'Toamasina Tanamakoa',
        ]);
        Agency::create([
            'id'=>'AGENCY-003',
            'name' => 'OTIV-PORT',
            'slug' => 'port_toamasina',
            'email'=>'port@gmail.com',
            'phone_number'=>'0000003',
            'location' => 'Toamasina Port',
        ]);
        Agency::create([
            'id'=>'AGENCY-004',
            'name' => 'OTIV-SOLIRAF',
            'slug' => 'soliraf_toamasina',
            'email'=>'soliraf@gmail.com',
            'phone_number'=>'0000004',
            'location' => 'Toamasina Anjoma',
        ]);
        Agency::create([
            'id'=>'AGENCY-005',
            'name' => 'OTIV-EZAKA',
            'slug' => 'ezaka_fenerivo',
            'email'=>'ezaka@gmail.com',
            'phone_number'=>'0000005',
            'location' => 'Fenerivo',
        ]);
        Agency::create([
            'id'=>'AGENCY-006',
            'name' => 'OTIV-ANDRY',
            'slug' => 'andry_vavantegnina',
            'email'=>'andry@gmail.com',
            'phone_number'=>'0000006',
            'location' => 'Vavantegnina',
        ]);
        Agency::create([
            'id'=>'AGENCY-007',
            'name' => 'OTIV-TANJONA',
            'slug' => 'tanjona_soneragna',
            'email'=>'tanjona@gmail.com',
            'phone_number'=>'0000007',
            'location' => 'Soneragna',
        ]);
        Agency::create([
            'id'=>'AGENCY-008',
            'name' => 'OTIV-SANDRIFY',
            'slug' => 'sandrify_mananara',
            'email'=>'sandrify@gmail.com',
            'phone_number'=>'0000008',
            'location' => 'Mananara',
        ]);
        Agency::create([
            'id'=>'AGENCY-009',
            'name' => 'OTIV-TSIMANAVAKA',
            'slug' => 'tsimanavaka_maroantsetra',
            'email'=>'tsimanavaka@gmail.com',
            'phone_number'=>'0000009',
            'location' => 'Maroantsetra',
        ]);
        Agency::create([
            'id'=>'AGENCY-010',
            'name' => 'OTIV-VOHITRA',
            'slug' => 'vohitra_brickaville',
            'email'=>'vohitra@gmail.com',
            'phone_number'=>'0000010',
            'location' => 'Brickaville',
        ]);
        Agency::create([
            'id'=>'AGENCY-011',
            'name' => 'OTIV-TOKY',
            'slug' => 'toky_vatomandry',
            'email'=>'toky@gmail.com',
            'phone_number'=>'0000011',
            'location' => 'Vatomandry',
        ]);
        Agency::create([
            'id'=>'AGENCY-012',
            'name' => 'OTIV-TRANAMBO',
            'slug' => 'tranambo_mahanoro',
            'email'=>'tranambo@gmail.com',
            'phone_number'=>'0000012',
            'location' => 'Mahanoro',
        ]);
        Agency::create([
            'id'=>'AGENCY-013',
            'name' => 'OTIV-MAHASOA',
            'slug' => 'mahasoa_ilakaEst',
            'email'=>'mahasoa@gmail.com',
            'phone_number'=>'0000013',
            'location' => 'Ilaka-Est',
        ]);
        Agency::create([
            'id'=>'AGENCY-014',
            'name' => 'OTIV-MAVELIMBOLA',
            'slug' => 'mahavelimbola_foulpointe',
            'email'=>'mahavelimbola@gmail.com',
            'phone_number'=>'0000014',
            'location' => 'Foulpointe',
        ]);
    }
}
