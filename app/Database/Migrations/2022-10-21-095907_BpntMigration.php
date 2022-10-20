<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BpntMigration extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'id_penduduk' => [
                'type'  => 'INT',
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('databpnt');
    }

    public function down()
    {
        $this->forge->dropTable('databpnt');
    }
}
