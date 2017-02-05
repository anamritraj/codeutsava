<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('districts')->insert([
                'district_name' => $faker->city,
                'state_id' => $faker->randomDigit(2) + 1,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
