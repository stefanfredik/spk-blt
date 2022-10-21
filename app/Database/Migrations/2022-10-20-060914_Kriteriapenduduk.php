<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteriapenduduk extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_penduduk' => [
                'type' => 'INT',
            ]
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kriteriapenduduk');
    }

    public function down() {
        $this->forge->dropTable('kriteriapenduduk');
    }
}
