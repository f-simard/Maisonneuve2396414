<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('cities')->insert([
			['name' => 'Montreal'],
			['name' => 'Quebec'],
			['name' => 'Drummondville'],
			['name' => 'Trois-Rivieres'],
			['name' => 'Matane'],
			['name' => 'Sherbrooke'],
			['name' => 'Gatineau'],
			['name' => 'Longueuil'],
			['name' => 'Brossard'],
			['name' => 'Candiac'],
			['name' => 'Laval'],
			['name' => 'Saint-Jerome'],
			['name' => 'Blainville'],
			['name' => 'Vaudreuil'],
			['name' => 'Ile-Perrot']
		]
		);
    }
}
