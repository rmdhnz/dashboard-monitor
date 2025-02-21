<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CallDisplay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "call_display_id" => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'antrian_id' => [
                "type" => "INT",
                'unsigned' => true,
            ],
            'nomor_antrian' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => false,
            ],
        ]);
        $this->forge->addPrimaryKey('call_display_id');
        $this->forge->createTable('call_display');
    }

    public function down()
    {
        $this->forge->dropTable('call_display');
    }
}
