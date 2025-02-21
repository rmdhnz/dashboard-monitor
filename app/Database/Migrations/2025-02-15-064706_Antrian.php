<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Antrian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'antrian_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomor_antrian' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => false,
            ],
            'tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'timestamp' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            "status" => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addPrimaryKey('antrian_id');
        $this->forge->createTable('antrian');
    }

    public function down()
    {
        $this->forge->dropTable('antrian');
    }
}
