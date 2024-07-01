<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFilePathToChanges extends Migration
{
    public function up()
    {
        $this->forge->addColumn('changes', [
            'file_path' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true, 'after' => 'approved_by'],
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('changes', 'file_path');
    }
    
}
