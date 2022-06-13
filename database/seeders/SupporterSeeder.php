<?php

namespace Database\Seeders;
use App\Models\Supporter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supporter::factory()->count(230)->create();
    }
}
