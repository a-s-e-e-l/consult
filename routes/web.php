<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\loginMemberController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
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

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')
            ->name('profile.edit');
        Route::patch('/profile', 'update')
            ->name('profile.update');
        Route::delete('/profile', 'destroy')
            ->name('profile.destroy');
    });
Route::controller(websiteController::class)->group(function () {
    Route::get('home', 'home')
        ->name('home');
    Route::get('blog/grid/{id}', 'blogGrid')
        ->name('blog.grid');
    Route::get('blog/detail/{id}', 'blogDetail')
        ->name('blog.detail');
});

Route::prefix('member')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('member.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [LoginMemberController::class, 'create'])
        ->name('member.login');
    Route::post('/login', [LoginMemberController::class, 'store'])
        ->name('login.member');
});
Route::middleware('member')->prefix('member')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blog/create', [BlogController::class, 'create']);
    Route::post('/blog/store', [BlogController::class, 'store']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/requests', [RequestController::class, 'index']);
    Route::get('/contents', [ContentController::class, 'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('member.dashboard');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('member.logout');
});

Route::post('/lang', [LocalizationController::class, 'setLang']);

Route::middleware(['auth', 'isAdmin'])
    ->controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index')->name('categories');
        Route::get('category/edit/{id}', 'edit')->name('category.edit');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/store', 'store')->name('category.store');
        Route::get('category/show/{id}', 'show')->name('category.show');
        Route::post('category/update/{id}', 'update')->name('category.update');
        Route::post('category/destroy/{id}', 'destroy')->name('category.destroy');
        Route::post('category/restore/{id}', 'restore')->name('category.restore');
        Route::get('category/search', 'search')->name('category.search');
    });
Route::middleware('auth')
    ->controller(BlogController::class)->group(function () {
        Route::get('blogs', 'index')->name('blogs');
        Route::get('blog/edit/{id}', 'edit')->name('blog.edit')->middleware('isAdmin');
        Route::get('blog/create', 'create')->name('blog.create');
        Route::post('blog/store', 'store')->name('blog.store');
        Route::get('blog/show/{id}', 'show')->name('blog.show');
        Route::post('blog/update/{id}', 'update')->name('blog.update');
        Route::post('blog/destroy/{id}', 'destroy')->name('blog.destroy')->middleware('isAdmin');
        Route::post('blog/restore/{id}', 'restore')->name('blog.restore')->middleware('isAdmin');
        Route::post('blog/acceptance/{id}', 'acceptance')->name('blog.acceptance')->middleware('isAdmin');
        Route::post('blog/notAcceptance/{id}', 'notAcceptance')->name('blog.notAcceptance')->middleware('isAdmin');
        Route::get('blog/search', 'search')->name('blog.search');
    });
Route::middleware(['auth', 'isAdmin'])
    ->controller(CommentController::class)->group(function () {
        Route::get('comments', 'index')->name('comments');
        Route::get('comment/edit/{id}', 'edit')->name('comment.edit');
        Route::get('comment/create', 'create')->name('comment.create');
        Route::post('comment/store', 'store')->name('comment.store');
        Route::get('comment/show/{id}', 'show')->name('comment.show');
        Route::post('comment/update/{id}', 'update')->name('comment.update');
        Route::post('comment/destroy/{id}', 'destroy')->name('comment.destroy');
        Route::post('comment/restore/{id}', 'restore')->name('comment.restore');
        Route::get('comment/search', 'search')->name('comment.search');
    });
Route::middleware(['auth', 'isAdmin'])
    ->controller(MemberController::class)->group(function () {
        Route::get('members', 'index')->name('members');
        Route::get('member/edit/{id}', 'edit')->name('member.edit');
        Route::get('member/create', 'create')->name('member.create');
        Route::post('member/store', 'store')->name('member.store');
        Route::get('member/show/{id}', 'show')->name('member.show');
        Route::post('member/update/{id}', 'update')->name('member.update');
        Route::post('member/destroy/{id}', 'destroy')->name('member.destroy');
        Route::post('member/restore/{id}', 'restore')->name('member.restore');
        Route::get('member/search', 'search')->name('member.search');
    });

Route::middleware(['auth', 'isAdmin'])
    ->controller(ServiceController::class)->group(function () {
        Route::get('services', 'index')->name('services');
        Route::get('service/edit/{id}', 'edit')->name('service.edit');
        Route::get('service/create', 'create')->name('service.create');
        Route::post('service/store', 'store')->name('service.store');
        Route::get('service/show/{id}', 'show')->name('service.show');
        Route::post('service/update/{id}', 'update')->name('service.update');
        Route::post('service/destroy/{id}', 'destroy')->name('service.destroy');
        Route::post('service/restore/{id}', 'restore')->name('service.restore');
        Route::get('service/search', 'search')->name('service.search');
    });
Route::middleware(['auth', 'isAdmin'])
    ->controller(RequestController::class)->group(function () {
        Route::get('req', 'index')->name('req');
        Route::get('req/edit/{id}', 'edit')->name('req.edit');
        Route::get('req/create', 'create')->name('req.create');
        Route::post('req/store', 'store')->name('req.store');
        Route::get('req/show/{id}', 'show')->name('req.show');
        Route::post('req/update/{id}', 'update')->name('req.update');
        Route::post('req/destroy/{id}', 'destroy')->name('req.destroy');
        Route::post('req/restore/{id}', 'restore')->name('req.restore');
        Route::get('req/search', 'search')->name('req.search');
    });
Route::middleware(['auth', 'isAdmin'])
    ->controller(ContentController::class)->group(function () {
        Route::get('contents', 'index')->name('contents');
        Route::get('content/edit/{id}', 'edit')->name('content.edit');
        Route::get('content/create', 'create')->name('content.create');
        Route::post('content/store', 'store')->name('content.store');
        Route::get('content/show/{id}', 'show')->name('content.show');
        Route::post('content/update/{id}', 'update')->name('content.update');
        Route::post('content/destroy/{id}', 'destroy')->name('content.destroy');
        Route::post('content/restore/{id}', 'restore')->name('content.restore');
        Route::get('content/search', 'search')->name('content.search');
    });
require __DIR__ . '/auth.php';
