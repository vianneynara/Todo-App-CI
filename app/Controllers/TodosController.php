<?php

namespace App\Controllers;

class TodosController extends BaseController
{
    public function index(): string
    {
        return view('todos_page');
    }
}