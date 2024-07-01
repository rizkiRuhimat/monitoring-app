<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddChatIdToAlerts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('alerts', [
            'chat_id' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true, 'after' => 'email'],
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('alerts', 'chat_id');
    }
    
}
