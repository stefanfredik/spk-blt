<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaikelayakanMigration extends Migration {
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
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nilaikelayakan');
    }

    public function down() {
        $this->forge->dropTable('nilaikelayakan');
    }
}
