<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_customer = new Customer();

            $new_customer->user_id = 1;
            $new_customer->name = $faker->word();
            $new_customer->email = $faker->safeEmail();
            $new_customer->telephone = $faker->numerify('###-#######');
            $new_customer->vat = $faker->numerify('0##########');
            $new_customer->save();
        }
    }
}
