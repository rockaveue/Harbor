<?php

namespace Database\Seeders;

use App\Models\Vessel;
use Illuminate\Database\Seeder;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Vessel::truncate();
        $faker = \Faker\Factory::create();
        $types = array('Cargo', 'Dry Cargo', 'General Cargo', 'Bulk carrier', 'Reefer', 'Container', 'Passenger');
        Vessel::create([
            'vessel_name' => 'Saint Rose',
            'company_id' => 2,
            'vessel_type' => 'Cargo',
            'vessel_flag' => 'MN',
        ]);
        for($i=2; $i<=15; $i++):
            $random = array_rand($types);
            Vessel::create([
                'vessel_name' => $faker->streetName,
                'company_id' => $faker->numberBetween(2,8),
                'vessel_type' => $types[$random],
                'vessel_flag' => $faker->countryCode,
            ]);
        endfor;
    }
}
