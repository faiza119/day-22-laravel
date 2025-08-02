<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('checkadmin');


Route::get('/unauthorized', function () {
    return view('unauthorized');
});
use App\Models\Category;

Route::get('/products', function () {
    $categories = Category::with('products')->get();
    return view('products.index', compact('categories'));
});
use App\Models\Student;
use App\Models\Course;

Route::get('/students', function () {
    $students = Student::with('courses')->get();
    return view('students.index', compact('students'));
});

Route::get('/courses', function () {
    $courses = Course::with('students')->get();
    return view('courses.index', compact('courses'));
});
use App\Http\Controllers\FileUploadController;

Route::get('/upload', [FileUploadController::class, 'index']);
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.store');
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::view('/view-books', 'books');
use App\Http\Controllers\BookController;

Route::get('/api/books', [BookController::class, 'index']);     // API JSON output
Route::get('/view-books', [BookController::class, 'view']);     // Blade view
Route::post('/books', [BookController::class, 'store']);        // Add new book
Route::delete('/books/{id}', [BookController::class, 'destroy']); // Delete book







