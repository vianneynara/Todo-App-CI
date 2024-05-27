<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'todo_id' => 1,
                'title' => 'Learn CodeIgniter 4',
                'isDone' => 0
            ],
            [
                'todo_id' => 2,
                'title' => 'Build a Todo App',
                'isDone' => 0
            ],
            [
                'todo_id' => 3,
                'title' => 'Create Auth',
                'isDone' => 0
            ]
        ];

        // Inserting using query builder
        $this->db->table('todos')->insertBatch($data);
    }
}