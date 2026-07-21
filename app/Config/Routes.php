<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ============================================
// PUBLIC ROUTES - NO AUTH NEEDED
// ============================================

// LANDING PAGE (Root - ganti dari Auth::login ke Landing::index)
$routes->get('/', 'Landing::index');  // <--- INI YANG PERLU DIUBAH

// Auth Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::doRegister');

// Demo Pages (Public - accessible without login)
$routes->get('/demo', 'Demo::index');
$routes->get('/demo/data', 'Demo::getDemoData');
$routes->get('/security-demo', 'SecurityDemo::index');


//perfomance testing SHA256 vs SHA512
$routes->get('voucher/performance-test', 'Voucher::performanceTest');

// ============================================
// PROTECTED ROUTES - NEED AUTH
// ============================================

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

    // Add this inside protected routes group
    $routes->get('/admin/student-vouchers/(:any)', 'Admin::getStudentVouchers/$1');

});