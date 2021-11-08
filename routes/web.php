<?php

use App\Http\Controllers\ClubColorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Models\Club;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    $clubs = Club::all();
    return view('club.index', compact('clubs'));
});


Route::get('clubs', [ClubController::class, 'index'])->name('club.index');

Route::get('club/{club}/colors', [ColorController::class, 'index'])->name('color.index');
Route::get('dash', [RoleController::class, 'index'])->name('dash.index');

Route::get('club/color/{clubColor}/students', [StudentController::class, 'index'])->name('student.index');
Route::get('color/{club}/create', [ColorController::class, 'create'])->name('color.create');
Route::get('club/create', [ClubController::class, 'create'])->name('club.create');
Route::get('student/{clubColor}/create', [StudentController::class, 'create'])->name('student.create');
Route::post('color/{club}/store',  [ColorController::class, 'store'])->name('color.store');
Route::post('club/{user}/store',  [ClubController::class, 'store'])->name('club.store');
Route::post('student/{clubColor}/store',  [StudentController::class, 'store'])->name('student.store');
Route::post('role/{user_id}/store',  [RoleController::class, 'store'])->name('user.role');

Route::post('add/score/student/{student}', [StudentController::class, 'addScore'])->name('student.add.score');
Route::post('del/student/{student}', [StudentController::class, 'del'])->name('student.del');
Route::post('del/color/{color}', [ColorController::class, 'del'])->name('color.del');
Route::post('del/club/{club}', [ClubController::class, 'del'])->name('club.del');
Route::post('add/button/student/{color}', [StudentController::class, 'addButton'])->name('student.add.button');
Route::post('del/button/student', [StudentController::class, 'delButton'])->name('student.del.button');
Route::post('del/te/student', [StudentController::class, 'delte'])->name('student.del.te');
Route::post('del/te/color/{club_id}', [ColorController::class, 'delte'])->name('color.del.te');
Route::post('add/te/{color_id}', [StudentController::class, 'addTe'])->name('add.te');
Route::post('add/teOld/{color_id}', [StudentController::class, 'addTeOld'])->name('add.te.old');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
