<?php

namespace Database\Seeders;

use App\Models\Beer;
use App\Models\Brewery;
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

        for ($x = 0; $x < 10; $x++) {
            $brewery = Brewery::factory()
                ->create();

            Beer::factory()
                ->count(rand(1, 3))
                ->for($brewery)
                ->create();
        }
    }
}
