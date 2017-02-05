<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 25;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('hospitals')->insert([ //,
                'name' => $faker->firstNameMale. " ". $faker->lastName. " Hospital",
                'address' => $faker->address,
                'avg_rating' => $faker->randomFloat(2, 3, 10),
                'contact_info' => $faker->phoneNumber,
                'district_id' => $faker->randomDigit(10) + 1,
                'specializations' => json_encode($faker->words($nb = 6, $asText = false)),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
