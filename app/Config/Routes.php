<?php

namespace Config;

use App\Controllers\Dashboard;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/home', 'Home::index');
// $routes->get('/logout', 'Login::logout');
// $routes->post('/login', 'Login::postIndex');
// $routes->get('/login', 'Login::getIndex');
// $routes->get('user/(:num)', 'User::getEdit/$1');
// $routes->group('user', static function ($routes) {
//     $routes->get('user/(:num)', 'User::getEdit/$1');
// });

$routes->get('dashboard', 'Dashboard::getIndex');

$routes->group("user", ['filter' => 'role:Admin'], function ($r) {
    $r->get("/", "User::getIndex");
    $r->get("tambah", "User::getTambah");
    $r->get("edit/(:num)", "User::getEdit/$1");
    $r->get("table", "User::getTable");

    $r->post("/", "User::postIndex");

    $r->put("edit/(:num)", "User::putEdit/$1");

    $r->delete("delete/(:num)", "User::deleteDelete/$1");
});

$routes->group("penduduk", ['filter' => 'role:Admin'], function ($r) {
    $r->get("/", "Penduduk::getIndex");
    $r->get("tambah", "Penduduk::getTambah");
    $r->get("table", "Penduduk::getTable");
    $r->get("edit/(:num)", "Penduduk::getEdit/$1");
    $r->get("detail/(:num)", "Penduduk::getDetail/$1");
    $r->get('importexcel', "Penduduk::getImportexcel");

    $r->post("/", "Penduduk::postIndex");
    $r->post("file", "Penduduk::postFile");
    $r->post("saveedit/(:num)", "Penduduk::postSaveedit/$1");
    $r->post("upload", "Penduduk::postUpload");

    $r->put("edit/(:num)", "Penduduk::putEdit/$1");

    $r->delete("delete/(:num)", "Penduduk::deleteDelete/$1");
});


$routes->group("blt", ['filter' => 'role:Admin'], function ($r) {
    $r->get("/", "Blt\Kelayakan::getTambah ");
    $r->get("tambah", "Penduduk::getTambah");
    $r->get("edit/(:num)", "Penduduk::getEdit/$1");
    $r->get("table", "Penduduk::getTable");
    $r->get('importexcel', "Penduduk::getImportexcel");

    $r->post("/", "Penduduk::postIndex");
    $r->post("file", "Penduduk::postFile");
    $r->post("saveedit/(:num)", "Penduduk::postSaveedit/$1");
    $r->post("upload", "Penduduk::postUpload");
    $r->put("edit/(:num)", "Penduduk::putEdit/$1");

    $r->delete("delete/(:num)", "Penduduk::deleteDelete/$1");
});


$routes->group("profile", function ($r) {
    $r->get("/", "Profile::index");
    $r->get("editpassword", "Profile::editPassword");

    $r->post("/", "Profile::gantiPassword");
});


// my custom router

// $routes->post('/user', 'User::postUser');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
