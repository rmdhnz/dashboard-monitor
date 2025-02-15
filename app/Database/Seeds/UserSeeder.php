<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 15; $i++) {
            $data = [
                'username' => $faker->userName,
                'email'    => $faker->email,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'created_at'  => Time::now(),
                'updated_at' => Time::now(),
            ];
            $this->db->table('user')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO user (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
    }
}
