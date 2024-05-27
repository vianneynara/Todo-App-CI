<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');


// Routes to the todo list page
$routes->get('/todos-page', 'TodosController::index');

// Route to GET /todos to fetch all todos
$routes->get('/todos','TodosController::getTodos');

// Route to POST /todos to create a new todo
$routes->post('/todos', 'TodosController::create');

// Route to DELETE /todos/{id} to delete a todo
$routes->delete('/todos/(:num)', 'TodosController::delete');

// Route to PUT /todos/{id}/title to edit a todo's title
$routes->put('/todos/(:num)/title', 'TodosController::editTitle');

// (currently unused) Route to PUT /todos/{id}/status to edit a todo's status
$routes->put('/todos/(:num)/status', 'TodosController::editStatus');

// Route to PUT /todos/{id}/toggle-status to toggle a todo's status
$routes->put('/todos/(:num)/toggle-status', 'TodosController::toggleStatus');