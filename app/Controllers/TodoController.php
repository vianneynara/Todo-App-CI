<?php

namespace App\Controllers;

class TodoController extends BaseController
{
    public function index(): string
    {
        $sessionId = session()->get('user_id');
        $model = new \App\Models\TodoModel();
        $data = [
            'todos' => $model->getTodosByUserId($sessionId)
        ];

        return view('todos_page', $data);
    }

    public function getTodos()
    {
        $todos = new \App\Models\TodoModel();
        $sessionId = session()->get('user_id');
        $todos = $todos->getTodosByUserId($sessionId);
        return $this->response->setJSON($todos);
    }

    public function create()
    {
        $sessionId = session()->get('user_id');
        $title = $this->request->getPost('title');
        $todos = new \App\Models\TodoModel();
        $res = $todos->createTodo($sessionId, $title);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo created successfully' : 'Failed to create todo'
        ]);
    }

    public function delete()
    {
        $todos = new \App\Models\TodoModel();
        $id = $this->request->getUri()->getSegment(2);
        $res = $todos->deleteTodo($id);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo deleted successfully' : 'Failed to delete todo'
        ]);
    }

    public function editTitle()
    {
        $title = $this->request->getPost('title');
        $todos = new \App\Models\TodoModel();
        $todoId = $this->request->getUri()->getSegment(2);
        $res = $todos->editTitleById($todoId, $title);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo title updated successfully' : 'Failed to update todo title'
        ]);
    }

    public function toggleStatus()
    {
        $todos = new \App\Models\TodoModel();
        $todoId = $this->request->getUri()->getSegment(2);
        $todo = $todos->find($todoId);
        $isDone = $todo['isDone'] == 0 ? 1 : 0;
        $res = $todos->editStatusById($todoId, $isDone);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo status updated successfully' : 'Failed to update todo status'
        ]);
    }
}