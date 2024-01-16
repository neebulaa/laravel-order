<?php

namespace Database\Seeders;

use App\Models\Buyer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buyer::factory(5)->create();
    }
}
