<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/db', function() {
    if(DB::connection('mysql')->getDatabaseName())
    {
    echo "connected sucessfully to database ".DB::connection('mysql')->getDatabaseName();
    }
});

Route::get('/migrations', function(){
    Artisan::call('migrate', 
            array(
                '--path' => 'database/migrations',
                '--database' => 'mysql',
                '--force' => true
            )
        );
    return redirect('/CRUD/home');
});

Route::get('/rollback', function(){
    Artisan::call('migrate:rollback', 
            array(
                '--path' => 'database/migrations',
                '--database' => 'mysql',
                '--force' => true
            )
        );
    return view('/index');
});

Route::get('/index', function(){
    return view('/index');
});
Route::get('/seed', 'testredacocontroller@seed');

Route::get('/CRUD/home', 'testredacocontroller@test');
Route::get('/redaco', 'testredacocontroller@redaco');

// Route::post('/postshot', 'testredacocontroller@shot');
Route::post('/shot', 'testredacocontroller@shot');

Route::get('/CRUD/home/add', 'testredacocontroller@add');
Route::post('/CRUD/home/store', 'testredacocontroller@store');

Route::get('/CRUD/home/edit/{id}', 'testredacocontroller@edit');
Route::put('/CRUD/home/update/{id}', 'testredacocontroller@update');

Route::get('/CRUD/home/delete/{id}', 'testredacocontroller@delete');

Route::get('/CRUD/home/like/{id}', 'testredacocontroller@like');
Route::get('/CRUD/home/unlike/{id}', 'testredacocontroller@unlike');

Route::get('/getshot', 'testredacocontroller@getshot');
Route::get('/notshotyet', function () {
    return view('notshot');
});




