<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\VotersController;

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

// Route::get('/voters', function () {
//     return view('admin.voters');
// });


Route::get('/voters',[VotersController::class,'index'])->name('index');
Route::post('/voters',[VotersController::class,'save'])->name('save');
Route::get('/edit-voter/{id}', [VotersController::class,'edit'])->name('edit');
Route::put('/voters', [VotersController::class,'update'])->name('update');




// voters
Route::post('login',[UserController::class,'check'])->name('voter.login');
Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']], function(){
	Route::get('/',[UserController::class,'login'])->name('login');
	Route::get('auth/vote',[UserController::class,'vote'])->name('vote');
	Route::post('webcam', [UserController::class, 'submit_vote'])->name('submit.vote');
});
