<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');


// Routes to the todo list page
$routes->get('/todos-page', 'TodoController::index');

// Route to GET /todos to fetch all todos
$routes->get('/todos','TodoController::getTodos');

// Route to POST /todos to create a new todo
$routes->post('/todos', 'TodoController::create');

// Route to DELETE /todos/{id} to delete a todo
$routes->post('/todos/(:num)/delete', 'TodoController::delete');

// Route to PUT /todos/{id}/title to edit a todo's title
$routes->post('/todos/(:num)/title', 'TodoController::editTitle');

// (currently unused) Route to PUT /todos/{id}/status to edit a todo's status
$routes->post('/todos/(:num)/status', 'TodoController::editStatus');

// Route to PUT /todos/{id}/toggle-status to toggle a todo's status
$routes->post('/todos/(:num)/toggle-status', 'TodoController::toggleStatus');