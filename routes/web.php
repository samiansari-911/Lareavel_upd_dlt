<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\StudentModel;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(StudentController::class)->group(function(){
    Route::get('/','data');
    Route::get('/StudentRegisteration','StudentRegisteration');
    Route::post('/StudentRegisteration','Create');
    Route::get('/user_view','user_view');
    Route::get('/user/delete/{id}','user_dlt')->name('dlt');
    Route::get('/user/edit/{id}','user_edit')->name('edit');
    Route::post('/user/update/{id}','user_update')->name('update');
    

    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
