<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AntrianSeeder extends Seeder
{
    public function run()
    {
        $faker  = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 90; $i++) {
            $tujuan = $faker->randomElement(['Teller', 'CS']);
            $nomor_antrian = $tujuan == 'Teller' ? "T_$i" : "C_$i";
            $sudah_dilayani = $faker->randomElement([true, false]);

            // Insert data ke dalam tabel antrian
            $this->db->table('antrian')->insert([
                'nomor_antrian'   => $nomor_antrian,
                'tujuan'          => $tujuan,
                'timestamp'       => $faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d H:i:s'),
                'sudah_dilayani'  => $sudah_dilayani,
            ]);
        }
    }
}
