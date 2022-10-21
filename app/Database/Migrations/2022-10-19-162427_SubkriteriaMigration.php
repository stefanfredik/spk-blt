<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubkriteriaMigration extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'id_kriteria' => [
                'type'  => 'INT',
            ],
            'subkriteria' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64'
            ],
            'nilai' => [
                'type'  => 'FLOAT',
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('subkriteria');
    }

    public function down() {
        $this->forge->dropTable('subkriteria');
    }
}
