<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChangesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'status' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'requested_by' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'approved_by' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('changes');
    }
    
    public function down()
    {
        $this->forge->dropTable('changes');
    }
    
}
