<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;



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
    return redirect('login');
});

    

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
   
});


    Route::prefix('user')->group(function(){
        Route::get('/profile',[AuthController::class, 'profile'])->name('user.profile');
        Route::get('/logout',[AuthController::class, 'logout'])->name('user.logout');
        Route::get('/password',[AuthController::class, 'password'])->name('user.password');
        Route::get('/edit/{id}',[AuthController::class, 'edit'])->name('user.edit');
        Route::post('/update',[AuthController::class, 'update'])->name('user.update');
        Route::post('/updatepass',[AuthController::class, 'updatepass'])->name('user.updatepass');
        
        });
        Route::resource('information','App\Http\Controllers\InformationController');
        Route::resource('service','App\Http\Controllers\ServiceController');
        Route::resource('project','App\Http\Controllers\ProjectController');
        Route::resource('chart','App\Http\Controllers\ChartController');
        Route::resource('contact','App\Http\Controllers\ContactController');
        Route::resource('portfolio','App\Http\Controllers\PortfolioController');