<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController; // Good practice to group imports

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage Route
Route::get('/', fn () => view('welcome'))->name('home');


// Dashboard Route - This is now the ONLY definition
Route::get('/dashboard', function (Request $request) {
    // Get the authenticated user's articles query builder
    $articlesQuery = $request->user()->articles();

    // Fetch stats
    $totalArticles = (clone $articlesQuery)->count();
    $articlesThisMonth = (clone $articlesQuery)->where('created_at', '>=', now()->startOfMonth())->count();

    // Get the 5 most recent articles
    $recentArticles = $request->user()->articles()->latest()->take(5)->get();

    // Pass the data to the view
    return view('dashboard', [
        'totalArticles' => $totalArticles,
        'articlesThisMonth' => $articlesThisMonth,
        'recentArticles' => $recentArticles,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Public route to list all articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Protected CRUD routes for articles
Route::middleware(['auth'])->group(function () {
    // Resource routes (create, store, show, edit, update, destroy)
    Route::resource('articles', ArticleController::class)->except(['index']);
});


// Authentication Routes (Breeze)
require __DIR__.'/auth.php';