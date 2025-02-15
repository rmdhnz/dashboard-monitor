<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $data = [
            'username' => $faker->userName,
            'email'    => $faker->email,
            'created_at'  => Time::now(),
            'updated_at' => Time::now(),
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO user (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
