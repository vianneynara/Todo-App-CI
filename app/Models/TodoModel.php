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
            "isDone",
            "user_id"
        ];
    }

    public function getTodos()
    {
        return $this->findAll();
    }

    public function getTodosByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function createTodo($sessionId, $title)
    {
        $data = [
            'title' => $title,
            'isDone' => 0,
            'user_id' => $sessionId
        ];
        return $this->insert($data);
    }

    public function deleteTodo($id)
    {
        return $this->where('todo_id', $id)->delete();
    }

    public function editTitleById($id, $title)
    {
        try {
            $this->where('todo_id', $id)->set('title', $title)->update();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function editStatusById($id, $isDone) {
        try {
            $this->where('todo_id', $id)->set('isDone', $isDone)->update();
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
                $this->where('todo_id', $id)->set('isDone', '1')->update();
            } else {
                $this->where('todo_id', $id)->set('isDone', '0')->update();
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}