<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

// MIGRATION 2: Mata Kuliah
class CreateMatakuliahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_mk' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
            ],
            'nama_mk' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'sks' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('matakuliah');
    }

    public function down()
    {
        $this->forge->dropTable('matakuliah');
    }
}