<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricePlans;

class PricePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(PricePlans::count()==0)
        {
            PricePlans::create([
                "plan_title" 		=> "Basic",
                "plan_price" 		=> 5.99,
                "plan_description" 	=> "All the basics for starting a new business",
                "plan_trial" 		=> 7,
                "status" 			=> 1,
            ]);
        }
    }
}
