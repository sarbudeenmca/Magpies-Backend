<?php

namespace Database\Seeders;

use App\Models\Deal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateDealStatusSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $statuses = ['Pending', 'Approved', 'Rejected', 'In Progress', 'Completed'];
        $deals = Deal::all();
        foreach ($deals as $deal) {
            $deal->status = $statuses[array_rand($statuses)];
            $deal->save();
        }
    }
}
