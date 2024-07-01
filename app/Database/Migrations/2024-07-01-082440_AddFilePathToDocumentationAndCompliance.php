<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFilePathToDocumentationAndCompliance extends Migration
{
    public function up()
    {
        $this->forge->addColumn('documentation', [
            'file_path' => ['type' => 'VARCHAR', 'constraint' => '255', 'after' => 'content'],
        ]);
    
        $this->forge->addColumn('compliance', [
            'file_path' => ['type' => 'VARCHAR', 'constraint' => '255', 'after' => 'resolution_date'],
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('documentation', 'file_path');
        $this->forge->dropColumn('compliance', 'file_path');
    }
}    
