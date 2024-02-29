<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LeadsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Create Dummy Leads
        $fakerLeads = Faker::create();
        for ($i = 0; $i < 600; $i++) {
            DB::table('leads')->insert([
                'lead_name' => $fakerLeads->name,
                'company_name' => $fakerLeads->company,
                'phone_number' => $fakerLeads->phoneNumber,
                'mobile_number' => $fakerLeads->phoneNumber,
                'email_address' => $fakerLeads->unique()->safeEmail,
                'city' => $fakerLeads->city,
                'country' => $fakerLeads->country,
                'lead_status' => $fakerLeads->randomElement(['New', 'Potential', 'Confirmed', 'Dead', 'Followup', 'Revert']),
                'lead_source' => $fakerLeads->randomElement(['Advertisement', 'Website', 'Referral', 'Social Media']),
                'description' => $fakerLeads->text($MaxNbChars = 191),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
