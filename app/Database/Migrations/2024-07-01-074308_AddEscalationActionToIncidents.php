<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEscalationActionToIncidents extends Migration
{
    public function up()
    {
        $this->forge->addColumn('incidents', [
            'escalation_level' => ['type' => 'VARCHAR', 'constraint' => '255', 'after' => 'status'],
            'actions_taken' => ['type' => 'TEXT', 'after' => 'escalation_level']
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('incidents', ['escalation_level', 'actions_taken']);
    }
    
}
