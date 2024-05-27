<?php

namespace App\Controllers;

class TodoController extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\TodoModel();
        $data = [
            'todos' => $model->getTodos()
        ];

        return view('todos_page', $data);
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
        $id = $this->request->getUri()->getSegment(2);
        $res = $todos->editTitleById($id, $title);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo title updated successfully' : 'Failed to update todo title'
        ]);
    }

    /**
     * Currently unused.
     */
    public function editStatus($id)
    {
        $isDone = $this->request->getPost('isDone');
        $todos = new \App\Models\TodoModel();
        $res = $todos->editStatusById($id, $isDone);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo status updated successfully' : 'Failed to update todo status'
        ]);
    }

    public function toggleStatus()
    {
        $todos = new \App\Models\TodoModel();
        $id = $this->request->getUri()->getSegment(2);
        $todo = $todos->find($id);
        $isDone = $todo['isDone'] == 0 ? 1 : 0;
        $res = $todos->editStatusById($id, $isDone);

        $statusCode = $res ? 200 : 400;
        return $this->response->setJSON([
            'status' => $statusCode,
            'message' => $res ? 'Todo status updated successfully' : 'Failed to update todo status'
        ]);
    }
}