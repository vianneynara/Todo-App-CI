<?php

namespace App\Controllers;

class TodoController extends BaseController
{
    public function index(): string
    {
        return view('todos_page');
    }

    public function getTodos()
    {
        $todos = new \App\Models\TodoModel();
        $todos = $todos->getTodos();
        return $this->response->setJSON($todos);
    }

    public function create()
    {
        $title = $this->request->getPost('title');
        $todos = new \App\Models\TodoModel();
        $res = $todos->createTodo($title);

        $message = $res ? 'Todo created successfully' : 'Failed to create todo';
        return $this->response->setJSON(['message' => $message]);
    }

    public function delete($id)
    {
        $todos = new \App\Models\TodoModel();
        $res = $todos->deleteTodo($id);

        $message = $res ? 'Todo deleted successfully' : 'Failed to delete todo';
        return $this->response->setJSON(['message' => $message]);
    }

    public function editTitle($id)
    {
        $title = $this->request->getPost('title');
        $todos = new \App\Models\TodoModel();
        $res = $todos->editTitleById($id, $title);

        $message = $res ? 'Todo title updated successfully' : 'Failed to update todo title';
        return $this->response->setJSON(['message' => $message]);
    }

    public function editStatus($id)
    {
        $isDone = $this->request->getPost('isDone');
        $todos = new \App\Models\TodoModel();
        $res = $todos->editStatusById($id, $isDone);

        $message = $res ? 'Todo status updated successfully' : 'Failed to update todo status';
        return $this->response->setJSON(['message' => $message]);
    }

    public function toggleStatus($id)
    {
        $todos = new \App\Models\TodoModel();
        $todo = $todos->find($id);
        $isDone = $todo['isDone'] == 0 ? 1 : 0;
        $res = $todos->editStatusById($id, $isDone);

        $message = $res ? 'Todo status updated successfully' : 'Failed to update todo status';
        return $this->response->setJSON(['message' => $message]);
    }
}