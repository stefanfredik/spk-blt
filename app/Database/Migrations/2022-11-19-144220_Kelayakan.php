<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelayakan extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'jenis_bantuan' => [
                'type'  => 'VARCHAR',
                'constraint'    => '32',
            ],
            'nilai' => [
                'type'  => 'FLOAT',
            ],
            'keterangan' => [
                'type'  => 'VARCHAR',
                'constraint' => 64
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kelayakan');
    }

    public function down() {
        $this->forge->dropTable('kelayakan');
    }
}
