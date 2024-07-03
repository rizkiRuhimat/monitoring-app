<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');


$routes->get('/login', 'AuthController::login');
$routes->post('/login-process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/inventory', 'InventoryController::index');
$routes->get('/inventory/create', 'InventoryController::create');
$routes->post('/inventory/store', 'InventoryController::store');
$routes->get('/inventory/edit/(:num)', 'InventoryController::edit/$1');
$routes->post('/inventory/update/(:num)', 'InventoryController::update/$1');
$routes->get('/inventory/delete/(:num)', 'InventoryController::delete/$1');

$routes->get('/user-management', 'UserManagement::index');
$routes->get('/user-management/create', 'UserManagement::create');
$routes->post('/user-management/store', 'UserManagement::store');
$routes->get('/user-management/edit/(:num)', 'UserManagement::edit/$1');
$routes->post('/user-management/update/(:num)', 'UserManagement::update/$1');
$routes->get('/user-management/delete/(:num)', 'UserManagement::delete/$1');

$routes->get('/monitoring_parameters', 'MonitoringParameters::index');
$routes->get('/monitoring_parameters/create', 'MonitoringParameters::create');
$routes->post('/monitoring_parameters/store', 'MonitoringParameters::store');
$routes->get('/monitoring_parameters/edit/(:num)', 'MonitoringParameters::edit/$1');
$routes->post('/monitoring_parameters/update/(:num)', 'MonitoringParameters::update/$1');
$routes->get('/monitoring_parameters/delete/(:num)', 'MonitoringParameters::delete/$1');

$routes->get('/incident-management', 'IncidentManagement::index');
$routes->get('/incident-management/create', 'IncidentManagement::create');
$routes->post('/incident-management/store', 'IncidentManagement::store');
$routes->get('/incident-management/edit/(:num)', 'IncidentManagement::edit/$1');
$routes->post('/incident-management/update/(:num)', 'IncidentManagement::update/$1');
$routes->get('/incident-management/delete/(:num)', 'IncidentManagement::delete/$1');

$routes->get('/compliance', 'Compliance::index');
$routes->get('/compliance/create', 'Compliance::create');
$routes->post('/compliance/store', 'Compliance::store');
$routes->get('/compliance/edit/(:num)', 'Compliance::edit/$1');
$routes->post('/compliance/update/(:num)', 'Compliance::update/$1');
$routes->get('/compliance/delete/(:num)', 'Compliance::delete/$1');

$routes->get('/documentation', 'Documentation::index');
$routes->get('/documentation/create', 'Documentation::create');
$routes->post('/documentation/store', 'Documentation::store');
$routes->get('/documentation/edit/(:num)', 'Documentation::edit/$1');
$routes->post('/documentation/update/(:num)', 'Documentation::update/$1');
$routes->get('/documentation/delete/(:num)', 'Documentation::delete/$1');

$routes->get('/reports', 'Reports::index');
$routes->post('/reports/generate', 'Reports::generate');
$routes->post('/reports/download', 'Reports::download');

$routes->get('/assets', 'Assets::index');
$routes->get('/assets/create', 'Assets::create');
$routes->post('/assets/store', 'Assets::store');
$routes->get('/assets/edit/(:num)', 'Assets::edit/$1');
$routes->post('/assets/update/(:num)', 'Assets::update/$1');
$routes->get('/assets/delete/(:num)', 'Assets::delete/$1');

$routes->get('uploads/(:any)', 'Documentation::download/$1');
$routes->get('compliance/download/(:any)', 'Compliance::download/$1');

$routes->get('/changes', 'Changes::index');
$routes->get('/changes/create', 'Changes::create');
$routes->post('/changes/store', 'Changes::store');
$routes->get('/changes/edit/(:num)', 'Changes::edit/$1');
$routes->post('/changes/update/(:num)', 'Changes::update/$1');
$routes->get('/changes/delete/(:num)', 'Changes::delete/$1');
$routes->get('/changes/download/(:segment)', 'Changes::download/$1');

$routes->get('/alerts', 'Alerts::index');
$routes->get('/alerts/create', 'Alerts::create');
$routes->post('/alerts/store', 'Alerts::store');
$routes->get('/alerts/edit/(:num)', 'Alerts::edit/$1');
$routes->post('/alerts/update/(:num)', 'Alerts::update/$1');
$routes->get('/alerts/delete/(:num)', 'Alerts::delete/$1');
