<?php

use Illuminate\Database\Seeder;

class ResponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 5000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('responses')->insert([ //,
                'receipt_id' => $faker->RandomNumber(),
                'hospital_id' => $faker->numberBetween(1, 25),
                'question_id' => $faker->numberBetween(1, 25),
                'response' => $faker->numberBetween(1, 10),
                'updated_at' => $faker->dateTimeThisYear('now', date_default_timezone_get()),
                'created_at' => $faker->dateTimeThisYear('now', date_default_timezone_get()),
            ]);
        }
    }
}
