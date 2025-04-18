<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CabangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            $this->db->table('cabang')->insert([
                'nama_cabang' => $faker->city,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]);
        }
    }
}
