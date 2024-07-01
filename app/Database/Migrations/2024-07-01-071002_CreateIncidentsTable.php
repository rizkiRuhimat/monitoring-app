<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIncidentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'severity' => ['type' => 'ENUM', 'constraint' => ['low', 'medium', 'high', 'critical']],
            'status' => ['type' => 'ENUM', 'constraint' => ['open', 'in_progress', 'resolved', 'closed']],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('incidents');
    }
    
    public function down()
    {
        $this->forge->dropTable('incidents');
    }
    
}
