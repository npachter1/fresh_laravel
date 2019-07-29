<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cars', 'CarController');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/db-check', function() {
    echo "Driver: " . Config::get('database.connections.mysql.driver') . "<br/>\r\n";
    echo "Host: " . Config::get('database.connections.mysql.host') . "<br/>\r\n";
    echo "Database: " . Config::get('database.connections.mysql.database') . "<br/>\r\n";
    echo "Username: " . Config::get('database.connections.mysql.username') . "<br/>\r\n";
    echo "Password: " . Config::get('database.connections.mysql.password') . "<br/>\r\n";
    echo "Connecting to Database: ".DB::connection()->getDatabaseName()."<br>";
    try {
        DB::connection()->getPdo();
        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }
});