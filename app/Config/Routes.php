<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('heroes/(:num)', 'HeroController::show/$1');
$routes->get('dungeons/(:num)', 'DungeonController::show/$1');
