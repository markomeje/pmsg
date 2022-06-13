<?php

namespace Database\Seeders;
use App\Models\{User, Staff};
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = [
            ['phone' => $faker->phoneNumber(), 'email' => 'admin@pmsg.ng', 'role' => 'admin', 'password' => Hash::make('!pMs-g@360.'), 'status' => 'active', 'name' => 'Administrator'],
        ];
        
        User::truncate();
        foreach ($users as $user) {
            User::create($user);
        }

    }
}
