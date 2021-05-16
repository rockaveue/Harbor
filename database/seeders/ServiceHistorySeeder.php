<?php
// B180910062 Dulguun
namespace Database\Seeders;

use App\Models\ServiceHistory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ServiceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        ServiceHistory::truncate();
        $faker = \Faker\Factory::create();
        $sailorCount = 20;
        for($j=1; $j <= 5; $j++):
            for($i=1; $i <= $sailorCount; $i++):
                $period = $faker->numberBetween(1,3);
                $mysailor = DB::table('sailor')->pluck('id');
                $sailor = $faker->randomElement($mysailor);
                $rank = DB::table('sailor')->where('id', $sailor)->pluck('rank_id');
                $vessel = DB::table('vessel')->pluck('id');
                $date = Carbon::createFromFormat('Y-m-d', $faker->dateTimeBetween($startDate = '-3 months', $endDate= 'now', $timezone = null)->format('Y-m-d'));
                ServiceHistory::create([
                    'sailor_id' => $sailor,
                    'rank_id' => $faker->randomElement($rank),
                    'vessel_id' => $faker->randomElement($vessel),
                    'sign_on_date' => $date->toDateString(),
                    'sign_on_port' => $faker->numberBetween(1,20),
                    'sign_off_date' => $date->addMonths($period)->toDateString(),
                    'sign_off_port' => $faker->numberBetween(1,20),
                    'contract_period' => $period,
                    'contract_end_date' => $faker->dateTimeBetween($startDate = '-1 months', $endDate= 'now', $timezone = null)->format('Y-m-d'),
                ]);
            endfor;
            $mysailor = DB::table('sailor')->pluck('id');
            $sailor = $faker->randomElement($mysailor);
            $rank = DB::table('sailor')->where('id', $sailor)->pluck('rank_id');
            $vessel = DB::table('vessel')->pluck('id');
            ServiceHistory::create([
                'sailor_id' => $sailor,
                'rank_id' => $faker->randomElement($rank),
                'vessel_id' => $faker->randomElement($vessel),
                'sign_on_date' => $date->toDateString(),
                'sign_on_port' => $faker->numberBetween(1,20),
                'sign_off_date' => null,
                'sign_off_port' => null,
                'contract_period' => $period,
                'contract_end_date' => $faker->dateTimeBetween($startDate = '-1 months', $endDate= 'now', $timezone = null)->format('Y-m-d'),
            ]);
        endfor;
    }
}
