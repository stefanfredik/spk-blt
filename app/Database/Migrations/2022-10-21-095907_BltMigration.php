<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BltMigration extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'id_peserta' => [
                'type'  => 'INT',
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datablt');
    }

    public function down()
    {
        $this->forge->dropTable('datablt');
    }
}
