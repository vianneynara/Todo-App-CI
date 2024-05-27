<?php

namespace app\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'todo_id';
    protected $useAutoIncrement = true;
    
    protected function initialize()
    {
        $this->allowedFields = [
            "title",
            "isDone"
        ];
    }

    public function getTodos()
    {
        return $this->all();
    }

    public function createTodo($title)
    {
        $data = [
            'title' => $title,
            'isDone' => 0
        ];
        return $this->insert($data);
    }

    public function deleteTodo($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function editTitleById($id, $title)
    {
        try {
            $this->where('id', $id)->set('title', $title)->update();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function editStatusById($id, $isDone) {
        try {
            $this->where('id', $id)->set('isDone', $isDone)->update();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function toggleStatusById($id)
    {
        try {
            $todo = $this->find($id);
            if ($todo['isDone'] == 'done') {
                $this->where('id', $id)->set('isDone', '1')->update();
            } else {
                $this->where('id', $id)->set('isDone', '0')->update();
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}