<?php
// B180910044 Battushig
namespace Database\Seeders;

use App\Models\Sailor;
use Illuminate\Database\Seeder;

class SailorSeeder extends Seeder
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
        Sailor::create([
            'rank_id' => 1,
            'sailor_name' => 'Dulguun',
            'date_of_birth' => '2001-05-11',
            'maritial_status' => 'Ганц бие',
            'address' => '13-р хороолол, 6-р хороо 120-22',
            'height' => '175',
            'weight' => '52',
            'blood_type' => 'B',
            'shoe_size' => '40',
            'job_status' => 1,
        ]);
        for($i=2; $i<=15; $i++):
            $random = array_rand($maritial);
            $random1 = array_rand($blood);
            Sailor::create([
                    'rank_id' => $faker->numberBetween(1,6),
                    'sailor_name' => $faker->firstName(null),
                    'date_of_birth' => $faker->unique()->dateTimeBetween($startDate = '-50 years', $endDate= '-20 years', $timezone = null)->format('Y-m-d'),
                    'maritial_status' =>$maritial[$random],
                    'address' => $faker->address,
                    'height' => $faker->numberBetween(160, 200),
                    'weight' => $faker->numberBetween(50, 80),
                    'blood_type' => $blood[$random1],
                    'shoe_size' => $faker->numberBetween(32, 48),
                    'job_status' => 1,
            ]);
        endfor;
    }
}
