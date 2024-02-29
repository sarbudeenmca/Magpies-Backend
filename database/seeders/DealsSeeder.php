<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DealsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Create Dummy Deals
        $fakerDeals = Faker::create('en_US');
        for ($i = 1; $i < 80; $i++) {

            $price = $fakerDeals->numberBetween(15, 400); // Generate a random price between 15 and 400
            $priceHundreds = $price * 100; // Convert the price to cents
            $priceFormatted = number_format($priceHundreds, 2, '.', ''); // Format the price to have two decimal places without commas


            DB::table('deals')->insert([
                'lead_id' => $fakerDeals->numberBetween(1, 600),
                'service_type' => $fakerDeals->randomElement(['Website', 'Android App', 'SEO', 'SEM', 'ios App', 'Digital Marketing', 'Graphic Design']),
                'estimated_price' => $priceFormatted,
                'follow_up' => $fakerDeals->realText($maxNbChars = 160, $indexSize = 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
