<?php

namespace Database\Seeders;

use App\Models\JobOffer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JobOfferSeeder extends Seeder
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
        $maritial = array('ганц бие', 'гэрлэсэн', 'салсан', 'бусад');
        $blood = array('AB', 'B', 'A', 'O');
        // JobOffer::create([
        //     'company_id',
        //     'rank_id',
        //     'contract_period',
        //     'contract_end_date',
        //     'state',
        //     'vessel_id',
        //     'sign_on_port',
        // ]);
        for($i=0; $i<=30; $i++):
            $random = array_rand($maritial);
            $random1 = array_rand($blood);
            $period = $faker->numberBetween(1, 4);
            JobOffer::create([
                'company_id' => $faker->numberBetween(2,8), // Company-uudin id ni 2-8 учир
                'rank_id' => $faker->numberBetween(1,6),
                'contract_period' => $period,
                'contract_end_date' => Carbon::now()->addMonths($period),
                'state' => 1,
                'vessel_id' => $faker->numberBetween(1,15),
                'sign_on_port' => $faker->numberBetween(1,20),
            ]);
        endfor;
    }
}
