<?php
// B180910062 Dulguun
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        User::truncate();
        $sailorCount = 20;
        $companyCount = 7;
        $faker = \Faker\Factory::create();
        $password = Hash::make('123');
        // $password = 'mypassword123';
        User::create([
            'name' => 'dulguun',
            'email' => 'dulguun@gmail.com',
            'password' => $password, // password
            'roles' => 'admin',
            'user_user_id' => null,
        ]);
        $roles = array('sailor', 'company');
        $company = DB::table('company')->pluck('id');
        $sailor = DB::table('sailor')->pluck('id');
        for($i=1; $i<=$companyCount; $i++):
            $selectedCompany = $faker->unique()->randomElement($company);
            $name = DB::table('company')->where('id', $selectedCompany)->first();
            // $random = array_rand($roles);
            User::create([
                'name' => $name->company_name,
                'email' => $faker->email,
                'password' => $password, // password
                // 'roles' => $roles[$random],
                'roles' => 'company',
                // 'user_user_id' => $faker->unique()->numberBetween(2,$companyCount+1),
                'user_user_id' => $selectedCompany,
                ]);
            endfor;
            for($i=1; $i<=$sailorCount; $i++):
                $selectedSailor = $faker->unique(true)->randomElement($sailor);
                $name2 = DB::table('sailor')->where('id', $selectedSailor)->first();
                User::create([
                    'name' => $name2->sailor_name,
                    'email' => $faker->email,
                    'password' => $password, // password
                    'roles' => 'sailor',
                    // 'user_user_id' => $faker->unique(true)->numberBetween(1,$sailorCount),
                    'user_user_id' => $selectedSailor,
            ]);
        endfor;
    }
}
