<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
  public function up()
  {
      $this->forge->addField([
          'id' => ['type' => 'INT', 'auto_increment' => true],
          'username' => ['type' => 'VARCHAR', 'constraint' => '100'],
          'password' => ['type' => 'VARCHAR', 'constraint' => '255'],
          'role' => ['type' => 'ENUM', 'constraint' => ['admin', 'user', 'viewer']],
          'created_at' => ['type' => 'DATETIME', 'null' => true],
          'updated_at' => ['type' => 'DATETIME', 'null' => true],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->createTable('users');
  
      // Insert admin user
      $data = [
          'username' => 'admin',
          'password' => password_hash('admin123', PASSWORD_DEFAULT),
          'role' => 'admin',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ];
  
      $this->db->table('users')->insert($data);
  }
  

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
