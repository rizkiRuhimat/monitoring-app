<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMonitoringParameterTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'monitoring_tool' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true
            ],
            'name_server' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true
            ],
            'functional_server' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'services' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'ports_service' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],
            'resources' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'thresholds' => [
                'type'       => 'INT',
                'null'       => true
            ],
            'kpi_indicator' => [
                'type'       => "ENUM('0','1')",
                'default'    => '1',
                'comment'    => '0= no 1= yes'
            ],
            'tags' => [
                'type'       => 'JSON',
                'null'       => true
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('monitoring_parameter');
    }

    public function down()
    {
        $this->forge->dropTable('monitoring_parameter');
    }
}
