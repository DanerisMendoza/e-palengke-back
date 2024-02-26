<?php

use App\Events\something; 
use App\Events\PrivateEvent; 
use App\Events\OrderEvent; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode += Artisan::call('config:clear');
    $exitCode += Artisan::call('route:clear');
    $exitCode += Artisan::call('optimize');

    return 'Cache, config, route cache, and optimization completed';
});

Route::get('/broadcast', function () {
    broadcast(new something());
});
Route::get('/pingme', function () {
    broadcast(new OrderEvent(4));
    // broadcast(new something());
});

// Broadcast::channel('private-channel.{user_id}', function ($user, $user_id) {
//     return $user->id == $user_id;
// });

// Route::get('/migrate', function() {
//     $exitCode = Artisan::call('migrate');
//     return 'Migrations completed';
// });

// Route::get('/seed', function() {
//     $exitCode = Artisan::call('db:seed');
//     return 'Seeders completed';
// });
