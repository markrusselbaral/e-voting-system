<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\VotersController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\CoursesectionController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\CollegesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartylistsController;
use App\Http\Controllers\Admin\CandidatesController;
use App\Http\Controllers\Admin\TitleController;
use App\Http\Controllers\Admin\StartorstopController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminLoginController;




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




// admin-voters

Route::post('/voters',[VotersController::class,'save'])->name('save');
Route::post('file-import', [VotersController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [VotersController::class, 'fileExport'])->name('file-export');
Route::get('/edit-voter/{id}', [VotersController::class,'edit'])->name('edit');
Route::put('/voters', [VotersController::class,'update'])->name('update');
Route::delete('/voters', [VotersController::class,'delete'])->name('delete');
Route::delete('/deleteAllVoters', [VotersController::class,'deleteAll'])->name('deleteAll');


// admin-position

Route::post('/positions',[PositionsController::class,'save'])->name('position-save');
Route::get('/edit-position/{id}', [PositionsController::class,'edit'])->name('position-edit');
Route::put('/positions', [PositionsController::class,'update'])->name('position-update');
Route::delete('/positions', [PositionsController::class,'delete'])->name('position-delete');
Route::delete('/deleteAllPositions', [PositionsController::class,'deleteAll'])->name('position-deleteAll');


// admin-course & section
Route::get('/course_section',[CoursesectionController::class,'index'])->name('course-section-index');
Route::post('/course_section',[CoursesectionController::class,'save'])->name('course-section-save');
Route::get('/edit-course_section/{id}', [CoursesectionController::class,'edit'])->name('course-section-edit');
Route::put('/course_section', [CoursesectionController::class,'update'])->name('course-section-update');
Route::delete('/course_section', [CoursesectionController::class,'delete'])->name('course-section-delete');
Route::delete('/deleteAllCourse_section', [CoursesectionController::class,'deleteAll'])->name('course-section-deleteAll');



// admin-department

Route::post('/departments',[DepartmentsController::class,'save'])->name('department-save');
Route::get('/edit-department/{id}', [DepartmentsController::class,'edit'])->name('department-edit');
Route::put('/departments', [DepartmentsController::class,'update'])->name('department-update');
Route::delete('/departments', [DepartmentsController::class,'delete'])->name('department-delete');
Route::delete('/deleteAllDepartments', [PositionsController::class,'deleteAll'])->name('department-deleteAll');


// admin-college

Route::post('/colleges',[CollegesController::class,'save'])->name('collage-save');
Route::get('/edit-college/{id}', [CollegesController::class,'edit'])->name('college-edit');
Route::put('/colleges', [CollegesController::class,'update'])->name('college-update');
Route::delete('/colleges', [CollegesController::class,'delete'])->name('college-delete');
Route::delete('/deleteAllCollege', [CollegesController::class,'deleteAll'])->name('college-deleteAll');



// admin-partylist

Route::post('/partylists',[PartylistsController::class,'save'])->name('partylist-save');
Route::get('/edit-partylist/{id}', [PartylistsController::class,'edit'])->name('partylist-edit');
Route::put('/partylists', [PartylistsController::class,'update'])->name('partylist-update');
Route::delete('/partylists', [PartylistsController::class,'delete'])->name('partylist-delete');
Route::delete('/deleteAllPartylist', [PartylistsController::class,'deleteAll'])->name('partylist-deleteAll');



// admin-candidate

Route::post('/candidates-search',[CandidatesController::class,'search'])->name('candidate-search');
Route::post('/candidates',[CandidatesController::class,'save'])->name('candidate-save');
Route::get('/edit-candidate/{id}', [CandidatesController::class,'edit'])->name('candidate-edit');
Route::put('/candidates', [CandidatesController::class,'update'])->name('candidate-update');
Route::delete('/candidates', [CandidatesController::class,'delete'])->name('candidate-delete');
Route::delete('/deleteAllCandidate', [CandidatesController::class,'deleteAll'])->name('candidate-deleteAll');


// admin-title

Route::get('/edit-title/{id}', [TitleController::class,'edit'])->name('title-edit');
Route::put('/title', [TitleController::class,'update'])->name('title-update');
Route::post('/change', [StartorstopController::class,'change'])->name('title-change');


// admin-user management

Route::post('/user',[UserManagementController::class,'save'])->name('user-save');
Route::get('/edit-user/{id}', [UserManagementController::class,'edit'])->name('user-edit');
Route::put('/user', [UserManagementController::class,'update'])->name('user-update');
Route::delete('/user', [UserManagementController::class,'delete'])->name('user-delete');
Route::delete('/deleteAllUsers', [UserManagementController::class,'deleteAll'])->name('user-deleteAll');


// profile
Route::post('/profiles',[ProfileController::class,'update'])->name('profile-update');
Route::post('/profile',[ProfileController::class,'update_photo'])->name('photo-update');

// login
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('login-index');
Route::post('/admin/login',[AdminLoginController::class,'login'])->name('admin-login');
Route::get('/admin/logout',[AdminLoginController::class,'signOut'])->name('admin-logout');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard-index');
    Route::get('/voters',[VotersController::class,'index'])->name('index');
    Route::get('/positions',[PositionsController::class,'index'])->name('position-index');
    Route::get('/course_section',[CoursesectionController::class,'index'])->name('course-section-index');
    Route::get('/departments',[DepartmentsController::class,'index'])->name('department-index');
    Route::get('/colleges',[CollegesController::class,'index'])->name('college-index');
    Route::get('/partylists',[PartylistsController::class,'index'])->name('partylist-index');
    Route::get('/candidates',[CandidatesController::class,'index'])->name('candidate-index');
    Route::get('/user',[UserManagementController::class,'index'])->name('user-index');
    Route::get('/title',[TitleController::class,'index'])->name('title-index');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile-index');

});



// voters
Route::post('login',[UserController::class,'check'])->name('voter.login');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('/show-candidate/{id}', [UserController::class,'edit'])->name('course-section-edit');
Route::post('/verify',[UserController::class,'verify'])->name('voter.verify');
Route::group(['middleware'=>['AuthCheck']], function(){
	Route::get('/',[UserController::class,'login'])->name('login');
	Route::get('auth/vote',[UserController::class,'vote'])->name('vote');
	Route::post('webcam', [UserController::class, 'submit_vote'])->name('submit.vote');
});





Route::get('/dash', function () {
    return view('client.login2');
});



Route::get('query',[DashboardController::class,'sample'])->name('query');
