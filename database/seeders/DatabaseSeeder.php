<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Car::factory(50)->create();
        Customer::factory(100)->create();
    }
}
