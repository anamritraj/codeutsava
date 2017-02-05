<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'adhar_id' => $faker->unique()->randomNumber(8),
                'mobile' => $faker->phoneNumber,
                'unique_token' => $faker->uuid(),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
