<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');


/**
 * Routes to the todo list page
 */
$routes->get('/todos-page', 'TodosController::index');

/**
 * Route to POST /todos to create a new todo
 */
$routes->post('/todos', 'TodosController::create');

/**
 * Route to GET /todos to fetch all todos
 */
$routes->get('/todos','TodosController::getTodos');