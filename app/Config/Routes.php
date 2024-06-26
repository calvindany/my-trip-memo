<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index', ['as' => 'home']);
$routes->get('/detail/(:num)', 'UsersController::getDetail/$1', ['as' => 'detail']);

$routes->group('admin', static function($routes) {

    $routes->group('', ['filter' => 'authfilter:noauthenticated'], static function($routes) {
        $routes->get('login', 'AdminsController::getLogin', ['as' => 'admin.login.get']);
        $routes->post('login', 'AdminsController::postLogin', ['as' => 'admin.login.post']);
    });

    $routes->group('', ['filter' => 'authfilter:authenticated'], static function($routes) {
        $routes->get('', 'AdminsController::manage', ['as' => 'admin.manage']);
        $routes->get('create', 'AdminsController::getCreate', ['as' => 'admin.create.get']);
        $routes->post('create', 'AdminsController::postCreate', ['as' => 'admin.create.post']);
        $routes->get('update/(:num)', 'AdminsController::getUpdate/$1', ['as' => 'admin.update.get']);
        $routes->post('update/(:num)', 'AdminsController::postUpdate/$1', ['as' => 'admin.update.get']);
        $routes->get('delete/(:num)', 'AdminsController::delete/$1', ['as' => 'admin.delete']);
        $routes->post('logout', 'AdminsController::postLogout', ['as' => 'admin.logout.post']);
    });
});