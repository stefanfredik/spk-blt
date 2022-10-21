<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KriteriaMigration extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'kriteria' => [
                'type'  => 'VARCHAR',
                'constraint'    => '32',
            ],
            'keterangan' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64'
            ],
            'bobot' => [
                'type'  => 'FLOAT',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['cost', 'benefit']
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kriteria');
    }

    public function down() {
        $this->forge->dropTable('kriteria');
    }
}
