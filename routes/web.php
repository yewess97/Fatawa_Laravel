<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SpecializeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
use App\Models\Specialize;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;


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
    $user_profiles = User::where('id', Auth::id())->get();
    $specializes = Specialize::all();

    return view('index', compact('specializes', 'user_profiles'));
})->name('index');

Route::get('/about-us', function () {
    $user_profiles = User::where('id', Auth::id())->get();
    $specializes = Specialize::all();
    $sheikhs = User::where('role', 1)->count();
    $users = User::where('role', 0)->count();
    $questions = Question::whereHas('answer')->count();

    return view('/about', compact('specializes', 'user_profiles', 'sheikhs', 'users', 'questions'));
})->name('about');

Route::get('/specialize_questions/{id}', [SpecializeController::class, 'specialize_questions'])->name('specialize_questions');
Route::get('/question_answer/{id}', [SpecializeController::class, 'question_answer'])->name('question_answer');

Route::middleware(['admin'])->prefix('/admin')->group(function () {
    Route::get('/admin', [MainController::class, 'admin'])->name('admin');

    Route::get('/admin-specializes', [SpecializeController::class, 'specializes'])->name('specializes');
    Route::post('/add_specialize', [SpecializeController::class, 'add_specialize'])->name('add_specialize');
    Route::post('/update_specialize/{id}', [SpecializeController::class, 'update_specialize'])->name('update_specialize');
    Route::get('/delete_specialize/{id}', [SpecializeController::class, 'delete_specialize'])->name('delete_specialize');


    Route::get('/admin-questions', [QuestionController::class, 'questions'])->name('questions');
    Route::post('/update_question/{id}', [QuestionController::class, 'update_question'])->name('update_question');


    Route::get('/admin-answers', [AnswerController::class, 'answers'])->name('answers');
    Route::post('/add_answer/{id}', [QuestionController::class, 'add_answer'])->name('add_answer');
    Route::post('/update_answer/{id}', [AnswerController::class, 'update_answer'])->name('update_answer');
    Route::get('/delete_answer/{id}', [AnswerController::class, 'delete_answer'])->name('delete_answer');


    Route::get('/admin-user_admin', [UserController::class, 'sheikhs'])->name('sheikhs');
    Route::post('/add_sheikh', [UserController::class, 'add_sheikh'])->name('add_sheikh');
    Route::post('/update_sheikh/id={id}', [UserController::class, 'update_sheikh'])->name('update_sheikh');
    Route::get('/delete_sheikh/id={id}', [UserController::class, 'delete_sheikh'])->name('delete_sheikh');


    Route::get('/admin-users', [UserController::class, 'users'])->name('users');
    Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
    Route::post('/update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');

});


Route::middleware(['auth'])->prefix('/profile')->group(function () {
    Route::get('/my-profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
    Route::get('/delete_profile/{id}', [HomeController::class, 'delete_profile'])->name('delete_profile');

    Route::get('/send-question', [HomeController::class, 'send_question'])->name('send_question');
    Route::post('/add_question', [QuestionController::class, 'add_question'])->name('add_question');
    Route::get('/delete_question/{id}', [QuestionController::class, 'delete_question'])->name('delete_question');

    Route::get('/my-questions', [HomeController::class, 'my_questions'])->name('my_questions');

    Route::get('/my-favourites', [FavouriteController::class, 'favourites'])->name('favourites');
    Route::post('/add_favourite/{id}', [FavouriteController::class, 'add_favourite'])->name('add_favourite');
    Route::get('/delete_favourite/{id}', [FavouriteController::class, 'delete_favourite'])->name('delete_favourite');
});

Route::get('/language/{lang}', [MainController::class, 'language'])->name('language');

Route::get('/search', [MainController::class, 'search'])->name('search');
Route::post('/search', [MainController::class, 'search'])->name('search');

Auth::routes();
