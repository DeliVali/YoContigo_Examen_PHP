<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
                ],
                'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                ],
                'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                ],
                'address' => [
                'type' => 'TEXT',
                'NULL' => TRUE,
                ],
        ]);
    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
