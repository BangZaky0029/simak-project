<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route redirect ke login
$routes->get('/', 'AuthController::login');

// ==================== AUTH ROUTES ====================
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

// ==================== DASHBOARD ROUTES ====================
$routes->get('dashboard', 'DashboardController::index');

// ==================== MAHASISWA ROUTES ====================
$routes->group('mahasiswa', function($routes) {
    $routes->get('/', 'MahasiswaController::index');
    $routes->get('create', 'MahasiswaController::create');
    $routes->post('store', 'MahasiswaController::store');
    $routes->get('edit/(:num)', 'MahasiswaController::edit/$1');
    $routes->post('update/(:num)', 'MahasiswaController::update/$1');
    $routes->get('delete/(:num)', 'MahasiswaController::delete/$1');
});

// ==================== MATA KULIAH ROUTES ====================
$routes->group('matakuliah', function($routes) {
    $routes->get('/', 'MatakuliahController::index');
    $routes->get('create', 'MatakuliahController::create');
    $routes->post('store', 'MatakuliahController::store');
    $routes->get('edit/(:num)', 'MatakuliahController::edit/$1');
    $routes->post('update/(:num)', 'MatakuliahController::update/$1');
    $routes->get('delete/(:num)', 'MatakuliahController::delete/$1');
});

// ==================== NILAI ROUTES ====================
$routes->group('nilai', function($routes) {
    $routes->get('/', 'NilaiController::index');
    $routes->get('create', 'NilaiController::create');
    $routes->post('store', 'NilaiController::store');
    $routes->get('edit/(:num)', 'NilaiController::edit/$1');
    $routes->post('update/(:num)', 'NilaiController::update/$1');
    $routes->get('delete/(:num)', 'NilaiController::delete/$1');
    $routes->get('laporan', 'NilaiController::laporan');
});