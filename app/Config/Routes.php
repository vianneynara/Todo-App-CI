<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// Route to GET the login page
$routes->get('/login-page', 'AuthController::loginPage');

// Route to POST /login to login
$routes->post('/login', 'AuthController::login');

// Route to GET register page
$routes->get('/register-page', 'AuthController::registerPage');

// Route to POST /register to register
$routes->post('/register', 'AuthController::register');

// Route to logout
$routes->get('/logout', 'AuthController::logout');

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

// Route to PUT /todos/{id}/toggle-status to toggle a todo's status
$routes->post('/todos/(:num)/toggle-status', 'TodoController::toggleStatus');