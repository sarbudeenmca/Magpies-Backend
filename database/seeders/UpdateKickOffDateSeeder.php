<?php

namespace Database\Seeders;

use App\Models\Deal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UpdateKickOffDateSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $deals = Deal::all();
        foreach ($deals as $deal) {
             // Generate a random date between March 1st, 2024, and May 31st, 2024
            $randomDate = Carbon::createFromDate(2024, rand(3, 5), rand(1, 31));

            $deal->kick_off_date = $randomDate;
            $deal->save();
        }
    }
}
