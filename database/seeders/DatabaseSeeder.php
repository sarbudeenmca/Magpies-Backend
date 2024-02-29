<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        \App\Models\User::factory()->firstOrCreate([
            'name' => 'Test User',
            'email' => 'haja@exhibitv.tech',
            'password' => Hash::make('admin'),
        ]);
    }
}
