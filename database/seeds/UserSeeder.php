<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,20) as $i) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => 123456,
            ]);
        }
    }
}
