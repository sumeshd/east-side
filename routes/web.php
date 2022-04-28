<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\UserController;

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

require __DIR__.'/auth.php';






//Route::post('customer_update/{id}', 'CustomerController@update')->name('updatecustomer');


Route::resource('Execution', ExecutionController::class);
Route::get('/execution',[ExecutionController::class,'index']);
Route::get('/execution/create',[ExecutionController::class,'create']);
Route::get('/execution/tablist',[ExecutionController::class,'tablist']);
Route::get('/execution/tasklist',[ExecutionController::class,'tasklist']);
Route::get('/execution/subtasklist',[ExecutionController::class,'subtasklist']);

//==============================user=========================
// Route::resource('User', UserController::class );
// Route::get('user',[UserController::class,'index']);
// Route::get('changepass/{id}',[UserController::class,'passwordedit']);
// Route::get('user/{id}/edit',[UserController::class,'edit']);
// Route::get('user/{id}',[UserController::class,'update']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//============================== Role ==========================
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);

});


//============================== User ==========================
Route::group(['middleware' => ['auth']], function() {
    Route::resource('User', UserController::class);
    Route::get('user',[UserController::class,'index']);
    Route::get('user/{id}/edit',[UserController::class,'edit']);
    //Route::get('user/{id}',[UserController::class,'update']);


});





//============================== Project ==========================
Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('Project', ProjectController::class);
    Route::get('/project',[ProjectController::class,'index']);
    Route::get('show/{id}', [ProjectController::class,'show']);
    Route::get('edit_project/{id}', [ProjectController::class,'edit']);
    Route::get('delete_project/{id}', [ProjectController::class,'destroy']);
    Route::get('updete_project/{id}', [ProjectController::class,'update']);
});


//============================== Customer ==========================
Route::group(['middleware' => ['auth']], function() {
    Route::resource('Customer', CustomerController::class);
    Route::get('customer', [CustomerController::class,'index']);
    Route::get('customer_show/{id}', [CustomerController::class,'show']);
    Route::get('/customer_edit/{id}', [CustomerController::class,'edit']);
    Route::controller(CustomerController::class)->group(function(){
    
        Route::get('/customer_delete/{id}', 'destroy');
        Route::get('/customer_update/{id}', 'update');

    });

});




Route::group(['middleware' => ['auth']], function() {

});