<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\DoctorController;

use App\Http\Controllers\SpecialtyController;

use App\Http\Controllers\BlogCategoryController;

use App\Http\Controllers\BlogController;

use App\Http\Controllers\BlogUserController;

use App\Http\Controllers\CommentController;

use App\Http\Controllers\AboutUsController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\DoctorUserController;

use App\Http\Controllers\AppointmentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('locale')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/news', [BlogUserController::class, 'index'])->name('news');
    Route::get('/news/search', [BlogUserController::class, 'search'])->name('news.search');
    Route::get('/news/{slug}', [BlogUserController::class, 'detail'])->name('news.detail');
    Route::get('/news/tag/{tag}', [BlogUserController::class, 'tag'])->name('news.tag');
    Route::get('/news/category/{slug}', [BlogUserController::class, 'category'])->name('news.category');
    Route::get('/news/author/{name}', [BlogUserController::class, 'author'])->name('news.author');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::get('/doctors', [DoctorUserController::class, 'index'])->name('doctors');

    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

    Route::get('/thank-you', [HomeController::class, 'thanks'])->name('thank');
});

Route::get('/change-language/{language}', [HomeController::class, 'changeLanguage'])->name('home.change-language');

Route::middleware('auth')->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    Route::get('/specialty', [SpecialtyController::class, 'index'])->name('specialty.index');
    Route::get('/specialty/create', [SpecialtyController::class, 'create'])->name('specialty.create');
    Route::post('/specialty', [SpecialtyController::class, 'store'])->name('specialty.store');

    Route::get('/category', [BlogCategoryController::class, 'index'])->name('blogCategory.index');
    Route::get('/category/create', [BlogCategoryController::class, 'create'])->name('blogCategory.create');
    Route::post('/category', [BlogCategoryController::class, 'store'])->name('blogCategory.store');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
