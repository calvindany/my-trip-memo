<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index', ['as' => 'home']);

$routes->group('admin', static function($routes) {

    $routes->group('', ['filter' => 'authfilter:noauthenticated'], static function($routes) {
        $routes->get('login', 'AdminsController::login', ['as' => 'admin.login.get']);
        $routes->post('login', 'AdminsController::login', ['as' => 'admin.login.post']);
    });

    $routes->group('', ['filter' => 'authfilter:authenticated'], static function($routes) {
        $routes->get('create', 'AdminsController::create', ['as' => 'admin.create']);
    });
});