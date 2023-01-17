<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DeployController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\Post_indexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::resource('/student', StudentController::class);

// one to one
Route::get('add_member', [MemberController::class, 'member']);
Route::get('show_group/{id}', [MemberController::class, 'show']);
Route::get('show_member/{id}', [GroupController::class, 'show']);
Route::get('index/{id}', [IndexController::class, 'index']);


// one to many
Route::get('author', [AuthorController::class, 'author']);
Route::get('post/{id}', [PostController::class, 'post']);
Route::get('show-post/{id}', [PostController::class, 'show_post']);
Route::get('show-author/{id}', [AuthorController::class, 'show_author']);
Route::get('show-index/{id}', [Post_indexController::class, 'index']);


// Has One Through
Route::get('add_mac', [MechanicController::class, 'add_mac']);
Route::get('add_car/{id}', [CarController::class, 'add_car']);
Route::get('add_owner/{id}', [OwnerController::class, 'add_owner']);
Route::get('show_owner/{id}', [OwnerController::class, 'show_owner']);

// Has Many Through
Route::get('add_pro', [ProjectController::class, 'add_pro']);
Route::get('add_lang/{id}', [LanguageController::class, 'add_lang']);
Route::get('add_deploy/{id}', [DeployController::class, 'add_deploy']);
Route::get('show_deploy/{id}', [DeployController::class, 'show_deploy']);


Route::get('teacher', [TeacherController::class, 'index']);
Route::post('teacher', [TeacherController::class, 'store']);
Route::get('fetch-teacher', [TeacherController::class, 'fetchteacher']);
Route::get('edit-teacher/{id}', [TeacherController::class, 'edit']);
Route::put('update-teacher/{id}', [TeacherController::class, 'update']);
Route::delete('delete-teacher/{id}', [TeacherController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::resource('/student', StudentController::class);
});



// blade
Route::get('demo/{name?}', function ($name = null) {
    $data = compact('name');
    return view('demo')->with($data);
});


// data table 
Route::get('user', [UserController::class, 'index']);
Route::get('user/list', [UserController::class, 'getStudents'])->name('user.list');
