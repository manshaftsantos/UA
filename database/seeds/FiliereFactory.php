<?php

use App\filiere;
use Illuminate\Database\Seeder;

class FiliereFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<= 15; $i++)
        {
            filiere::create(
                [
                    'nom_filiere' => strtoupper($faker->word()).$faker->numberBetween(1,5),
                ]
                );
        }
    }
}
