<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateComplianceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'compliance_metric' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'status' => ['type' => 'ENUM', 'constraint' => ['compliant', 'non_compliant']],
            'issue_date' => ['type' => 'DATETIME', 'null' => true],
            'resolution_date' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('compliance');
    }
    
    public function down()
    {
        $this->forge->dropTable('compliance');
    }
    
}
