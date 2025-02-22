<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'   => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'  => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,  // Untuk username yang unik
            ],
            'email'     => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,  // Untuk email yang unik
            ],
            'password'  => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            "role" => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            "lokasi" => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
