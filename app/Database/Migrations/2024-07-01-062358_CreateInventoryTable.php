<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInventoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'assetName' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'assetType' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'criticality' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'owner' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inventory');
    }
    
    public function down()
    {
        // $this->forge->dropTable('inventory');
    }
    
}
