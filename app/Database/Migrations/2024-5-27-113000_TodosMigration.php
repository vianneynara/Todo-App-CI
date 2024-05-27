<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TodoMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'todo_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'isDone' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ]
        ]);
        $this->forge->addKey('todo_id', true);
        $this->forge->createTable('todos');
    }

    public function down()
    {
        $this->forge->dropTable('todos');
    }
}
