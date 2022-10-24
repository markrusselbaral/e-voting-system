<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\VotersController;
use App\Http\Controllers\Admin\PositionsController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


// admin-voters
Route::get('/voters',[VotersController::class,'index'])->name('index');
Route::post('/voters',[VotersController::class,'save'])->name('save');
Route::get('/edit-voter/{id}', [VotersController::class,'edit'])->name('edit');
Route::put('/voters', [VotersController::class,'update'])->name('update');
Route::delete('/voters', [VotersController::class,'delete'])->name('delete');
Route::delete('/deleteAllVoters', [VotersController::class,'deleteAll'])->name('deleteAll');


// admin-position
Route::get('/positions',[PositionsController::class,'index'])->name('position-index');
Route::post('/positions',[PositionsController::class,'save'])->name('position-save');
Route::get('/edit-position/{id}', [PositionsController::class,'edit'])->name('position-edit');
Route::put('/positions', [PositionsController::class,'update'])->name('position-update');
Route::delete('/positions', [PositionsController::class,'delete'])->name('position-delete');
Route::delete('/positionsAllPositions', [PositionsController::class,'deleteAll'])->name('position-deleteAll');






// voters
Route::post('login',[UserController::class,'check'])->name('voter.login');
Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']], function(){
	Route::get('/',[UserController::class,'login'])->name('login');
	Route::get('auth/vote',[UserController::class,'vote'])->name('vote');
	Route::post('webcam', [UserController::class, 'submit_vote'])->name('submit.vote');
});





Route::post('file-import', [VotersController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [VotersController::class, 'fileExport'])->name('file-export');
