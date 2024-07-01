<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'asset_name' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'type' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'location' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'purchase_date' => ['type' => 'DATE'],
            'critical_status' => ['type' => 'BOOLEAN'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('assets');
    }
    
    public function down()
    {
        $this->forge->dropTable('assets');
    }
    
}
