<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PendudukMigration extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment' => true
            ],
            'id_user' => [
                'type'  => 'INT',

            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'no_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tanggal_lahir' => [
                'type' => 'DATETIME'
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => 4
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint' => 4
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penduduk');
    }

    public function down() {
        $this->forge->dropTable('penduduk');
    }
}
