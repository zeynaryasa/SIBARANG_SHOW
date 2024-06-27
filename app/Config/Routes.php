<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login');

// view from navbar
$routes->get('admin', 'Admin::index');
$routes->get('karyawan', 'Karyawan::index');
$routes->get('barang', 'Barang::index');
$routes->get('peminjaman', 'Peminjaman::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('sistem', 'Sistem::index');
$routes->get('profile', 'Profile::index');

// view with parameter
$routes->get('detail/(:any)', 'DetailPeminjaman::index/$1');
$routes->get('barang/(:any)', 'Barang::viewUpdate/$1');
$routes->get('insertBarang', 'Barang::viewInsert');
$routes->get('insertKaryawan', 'Karyawan::viewInsert');
$routes->get('updateAdmin/(:any)', 'Admin::viewUpdate/$1');
$routes->get('updateKaryawan/(:any)', 'Karyawan::viewUpdate/$1');

// update
$routes->post('updateSistem', 'Sistem::updateSistem');
$routes->post('updateProfile', 'Admin::updateByLogin');
$routes->post('updateBarang', 'Barang::update');
$routes->post('updateAdmin', 'Admin::update');
$routes->post('updateKaryawan', 'Karyawan::update');
$routes->post('konfirmasiPeminjaman', 'Peminjaman::approve');

// insert
$routes->post('insertBarang', 'Barang::insert');
$routes->post('insertKaryawan', 'Karyawan::insert');

// delete
$routes->post('deleteKaryawan', 'Karyawan::delete');
$routes->post('deleteBarang', 'Barang::delete');
$routes->post('deletePeminjaman', 'Peminjaman::delete');
$routes->post('deleteDetail', 'DetailPeminjaman::delete');


// Dashboard proses
$routes->get('resetCart', 'Dashboard::resetCart');
$routes->get('resetKaryawan', 'Dashboard::resetKaryawan');
$routes->post('keranjangBarang', 'Dashboard::keranjangBarang');
$routes->post('cart', 'Dashboard::cart');
$routes->post('karyawanCart', 'Dashboard::karyawanCart');
$routes->post('getDataKaryawan', 'Dashboard::getDataKaryawan');


// login
$routes->get('login', 'Home::login');
$routes->post('prcLogin', 'Home::prcLogin');

// logout
$routes->get('logout', 'Home::logout');
