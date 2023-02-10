<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keputusan extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'nama_lengkap'  => [
                'type'  => 'VARCHAR',
                'constraint'    => '64',
            ],
            'no_kk' => [
                'type'  => 'VARCHAR',
                'constraint'    => '32',
            ],
            'tempat_lahir' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64',
            ],
            'tanggal_lahir' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64',
            ],
            'jenis_kelamin' => [
                'type'  => 'VARCHAR',
                'constraint'    => '32',
            ],
            'nilai' => [
                'type'  => 'FLOAT',
            ],
            'status_layak' => [
                'type'  => 'VARCHAR',
                'constraint'    => '128',
            ],
        ];


        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keputusan_blt');

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keputusan_bpnt');
    }

    public function down() {
        $this->forge->dropTable('keputusan_blt');
        $this->forge->dropTable('keputusan_bpnt');
    }
}
