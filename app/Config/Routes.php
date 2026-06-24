<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes (No auth needed)
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/register', 'Auth::register');      // ADD THIS
$routes->post('/register', 'Auth::doRegister');   // ADD THIS

// Protected Routes
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/logout', 'Auth::logout');
    
    // Admin Routes
    $routes->get('/admin', 'Admin::index');
    $routes->get('/admin/generate', 'Admin::generateForm');
    $routes->post('/admin/generate', 'Admin::generateVoucher');
    $routes->post('/admin/bulk-generate', 'Admin::bulkGenerate');
    $routes->post('/admin/generate-selected', 'Admin::generateSelected');
    
    // Vendor Routes
    $routes->get('/vendor/dashboard', 'Voucher::dashboard');
    $routes->get('/scan', 'Voucher::scan');
    $routes->get('/verify/(:any)', 'Voucher::verify/$1');
    $routes->get('/vendor/vouchers', 'Voucher::myVouchers');
    
    // Student Routes
    $routes->get('/student/vouchers', 'Student::index');

    // PWA Routes
    $routes->get('/offline', 'Home::offline');

    // API for PWA sync
    $routes->post('/admin/generate-voucher-api', 'Admin::generateVoucherAPI');
});