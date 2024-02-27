<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->firstOrCreate([
        //     'name' => 'Test User',
        //     'email' => 'haja@exhibitv.tech',
        //     'password' => Hash::make('admin'),
        // ]);

        $faker = Faker::create();
        for ($i = 0; $i < 600; $i++) {
            DB::table('leads')->insert([
                'lead_name' => $faker->name,
                'company_name' => $faker->company,
                'phone_number' => $faker->phoneNumber,
                'mobile_number' => $faker->phoneNumber,
                'email_address' => $faker->unique()->safeEmail,
                'city' => $faker->city,
                'country' => $faker->country,
                'lead_status' => $faker->randomElement(['New', 'Potential', 'Confirmed', 'Dead', 'Followup', 'Revert']),
                'lead_source' => $faker->randomElement(['Advertisement', 'Website', 'Referral', 'Social Media']),
                'description' => $faker->text($MaxNbChars = 191),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
