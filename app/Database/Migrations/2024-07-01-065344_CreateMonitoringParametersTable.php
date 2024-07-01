<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMonitoringParametersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'parameter_name' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'threshold' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'kpi_indicator' => ['type' => 'BOOLEAN'],
            'description' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('monitoring_parameters');
    }
    
    public function down()
    {
        $this->forge->dropTable('monitoring_parameters');
    }
    
}
