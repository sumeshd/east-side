<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectdocController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Teamwork\TeamController;
use App\Http\Controllers\Teamwork\TeamMemberController;

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\GalleryController;


use App\Http\Controllers\TaskController;

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
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
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





// ======================settings================
Route::resource('Settings', SettingsController::class );
Route::get('presales', [SettingsController::class,'presales'] );
Route::get('postsales', [SettingsController::class,'postsales'] );
Route::get('execution', [SettingsController::class,'execution'] );
Route::get('presalesstore', [SettingsController::class,'presalesStore'] );
Route::get('postsalesstore', [SettingsController::class,'postsalesStore'] );
Route::get('executionstore', [SettingsController::class,'executionStore'] );
Route::get('parent', [SettingsController::class,'fetch']);
Route::get('settingsview', [SettingsController::class,'settingsview']);
 



Route::get('document/{settingsID}/{projectID}/{type}', [ProjectdocController::class,'index']);
Route::get('/adddocument/{settingsID}/{projectID}/{type}', [ProjectdocController::class,'create']);
Route::post('/document/upload', [ProjectdocController::class,'store']);

Route::get('/image/delete/{id}/{taskname}/{settings}', [GalleryController::class,'destroy']);
Route::get('/image/download/{id}', [GalleryController::class,'download']);


Route::get('comment/{settingsID}/{projectID}/{type}', [CommentController::class,'index']);
Route::post('/comment', [CommentController::class, 'store']);
//Route::get('gy/{taskname}/{settings}', 'GalleryController@index')->name('gallery');
//Route::resource('/gallery/{taskname}/{settings}', GalleryController::class );
//Route::resource('/addimage/{taskname}/{settings}', GalleryController::class );
//=======================Comment===========================
Route::get('comment/{id}/{settings}', [SettingsController::class,'commentssettings']);

Route::get('/comment/{id}', [CommentController::class, 'destroy']);




// Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');




// =====================Project Setings========================
Route::get('projectsettings/{settings}/{id}', [ProjectController::class,'projectsettings']);

// Route::get('project_presales/{presales}/{id}',[ProjectController::class,'projectsettings']);
// Route::get('project_postsales/{id}',[ProjectController::class,'postsales']);
// Route::get('project_execution/{id}',[ProjectController::class,'execution']);

Route::get('/project/presalesstore', [ProjectController::class,'presalesstore'] );
Route::get('/project/postsalesstore', [ProjectController::class,'postsalesstore'] );
Route::get('/project/executionstore', [ProjectController::class,'executionstore'] );
Route::get('projectVS/{id}', [ProjectController::class,'projectVS'] );
Route::get('/project/parent', [ProjectController::class,'fetch']);



//=========================Task===========================
Route::get('/project/task',[TaskController::class,'show']);

Route::resource('Task', TaskController::class );
Route::get('/task/assignbyme',[TaskController::class, 'taskassignbyme']);
Route::get('/project/addmember',[TaskController::class,'addmember']);
Route::get('/project/addmember/{id}',[TaskController::class,'addmember']);
Route::get('/project/description',[TaskController::class,'description']);
Route::get('/project/comment',[TaskController::class,'comment']);
Route::get('/project/date',[TaskController::class,'date']);
Route::get('/tasklog',[TaskController::class,'tasklog']);
Route::get('/task/status',[TaskController::class,'status']);
Route::get('/task/statusdate',[TaskController::class,'statusdate']);




Route::group(['middleware' => ['auth']], function() {

});