<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index');

$routes->group('admin', ['filter', 'authfilter:authenticated'], static function($routes) {
    $routes->get('/create', 'AdminsController::create');
});