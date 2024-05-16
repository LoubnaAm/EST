<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\Http\Controllers\BotManController;
use App\Http\Middleware\VerifyCsrfToken;

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

Route::get('/', function () {
    return view('welcome');
});

//google
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//facebook
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


//github
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
require __DIR__.'/expertauth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.auth.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


////expert
Route::get('/expert/dashboard', function () {
    return view('expert.auth.dashboard');
})->middleware(['auth:expert', 'verified'])->name('expert.dashboard');


Route::get('/dashboard', [CommentController::class, 'index'])->name('dashboard');
Route::post('/submit-comment', [CommentController::class, 'store'])->name('commentaire.store');
Route::post('/commentaires/{id}/like', [CommentController::class, 'likeComment'])->name('likeComment');
Route::post('/commentaires/{id}/dislike', [CommentController::class, 'dislikeComment'])->name('dislikeComment');


///Partie Admin

/*=============================Users Route======================================*/

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');
Route::get('/admin/experts', function () {
    return view('admin.experts');
})->name('admin.experts');
Route::get('/admin/rating', function () {
    return view('admin.rating');
})->name('admin.rating');
Route::get('/admin/historique', function () {
    return view('admin.historique');
})->name('admin.historique');
Route::get('/fetch-users', [UsersController::class, 'fetchUsers']);
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser'])->name('delete.user');
Route::get('/infos/user/modal/{id}',[UsersController::class, 'create'])->name('infos.user.modal');
Route::get('/filter-users',[UsersController::class,'filterUsers'])->name('filter.users');
Route::post('/store', [HistoriqueController::class, 'store'])->name('store');
/*=============================ChatBot Route======================================*/
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle'])->withoutMiddleware([VerifyCsrfToken::class]);
/*=============================test Route======================================*/
