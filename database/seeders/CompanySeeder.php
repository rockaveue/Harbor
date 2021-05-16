<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Company::truncate();
        $faker = \Faker\Factory::create();
        // $password = Hash::make('123');
        // $password = 'mypassword123';
        Company::create([
            'company_name' => 'MVL',
            'contact_person' => 'Boldbaatar',
            'email' => 'boldoo@email.com',
            'phone' => '98989898',
            'address' => 'buhiinUrguu',
        ]);
        for($i=2; $i<=7; $i++):
            Company::create([
                'company_name' => $faker->unique()->lastName,
                'contact_person' => $faker->firstName(null),
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        endfor;
    }
}
