<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddServerInfoToMonitoringParameters extends Migration
{
    public function up()
    {
        $this->forge->addColumn('monitoring_parameters', [
            'hostname' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'description'
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'hostname'
            ],
            'service_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'ip_address'
            ]
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('monitoring_parameters', 'hostname');
        $this->forge->dropColumn('monitoring_parameters', 'ip_address');
        $this->forge->dropColumn('monitoring_parameters', 'service_name');
    }
    
}
