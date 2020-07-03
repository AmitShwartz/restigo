<?php

use App\Diversity;
use Illuminate\Database\Seeder;

class DiversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Diversity::class,10)->create();
    }
}
