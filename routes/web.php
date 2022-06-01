<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Teamwork\TeamController;
use App\Http\Controllers\Teamwork\TeamMemberController;

use App\Http\Controllers\SettingsController;

use App\Http\Controllers\CommentController;
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


//==================================Team================================
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    //Route::get('teams', [TeamController::class, 'index']);
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');
    Route::post('user/{teamid}', [TeamMemberController::class, 'adduser'])->name('teams.adduser');
    Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
});

//Route::get('teams', [TeamController::class, 'index']);







Route::resource('Settings', SettingsController::class );
Route::get('presales', [SettingsController::class,'presales'] );
Route::get('postsales', [SettingsController::class,'postsales'] );
Route::get('execution', [SettingsController::class,'execution'] );
Route::get('presalesstore', [SettingsController::class,'presalesstore'] );
Route::get('postsalesstore', [SettingsController::class,'postsalesstore'] );
Route::get('executionstore', [SettingsController::class,'executionstore'] );
Route::get('parent', [SettingsController::class,'fetch']);


Route::get('gallery', [SettingsController::class,'gallery']);
Route::get('settings/imageadd', [SettingsController::class,'imageadd']);
Route::post('image/upload', [SettingsController::class,'imageupload']);
Route::delete('image/delete/{id}', [SettingsController::class,'imagedelete']);
Route::get('settingsview', [SettingsController::class,'settingsview']);






Route::post('comment', [CommentController::class, 'store']);
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::group(['middleware' => ['auth']], function() {

});