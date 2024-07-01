<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToAssets extends Migration
{
    public function up()
    {
        $this->forge->addColumn('assets', [
            'asset_number' => ['type' => 'VARCHAR', 'constraint' => '255', 'after' => 'id'],
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('assets', ['asset_number', 'type', 'critical_status']);
    }
    
    
}
