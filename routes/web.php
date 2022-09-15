<?php

use App\Http\Controllers\CalenderController;
use App\Http\Controllers\CalenderUserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/calenders', CalenderController::class)
    ->names(['index'=>'calender.index',
            'create' => 'calender.create',
            'store' => 'calender.store',
            'destroy' => 'calender.destroy',
            'edit' => 'calender.edit',
            'update' => 'calender.update'
            ])
    ->middleware(['auth']);

Route::get('/calender/{calenderId}/{calenderName}', [CalenderUserController::class, 'join'])->middleware(['auth']);

require __DIR__.'/auth.php';
