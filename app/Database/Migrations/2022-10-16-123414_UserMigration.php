<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ], 'updated_at' => [
                'type' => 'DATETIME',
            ], 'last_login' => [
                'type' => 'DATETIME',
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down() {
        $this->forge->dropTable('user');
    }
}
