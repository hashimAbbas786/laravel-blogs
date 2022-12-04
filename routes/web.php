<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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


Route::get('/', [BlogController::class, "index"]);
Route::get("/blog/{slug}", [BlogController::class, "blog"]);
Route::get("/blogs/category/{slug}", [BlogController::class, "categorySearch"]);
Route::post("/comments/post", [CommentController::class, "store"]);
Route::get("/posts/get", [BlogController::class, "search"]);

Route::group(["middleware" => "auth"], function () {
    
    Route::get("/admin/category/add", [CategoryController::class, "create"]);
    Route::post("/admin/category", [CategoryController::class, "store"]);
    Route::get("/admin/category", [CategoryController::class, "index"]);
    Route::delete("/admin/category/{id}", [CategoryController::class, "delete"]);
    Route::get("/admin/category/{slug}/update", [CategoryController::class, "edit"]);
    Route::put("/admin/category/{slug}", [CategoryController::class, "update"]);
    Route::get("/admin/categories", [CategoryController::class, "search"]);

    Route::get("/admin/blogs/add", [BlogController::class, "create"]);
    Route::post("/admin/blogs", [BlogController::class, "store"]);
    Route::get("/admin/blogs", [BlogController::class, "home"]);
    Route::put("/admin/blog/{id}/status", [BlogController::class, "status"]);
    Route::get("admin/blogsSearch", [BlogController::class, "admin_search"]);
    Route::get("/admin/{slug}/blog", [BlogController::class, "update"]);
    Route::put("/admin/blog/{id}/update", [BlogController::class, "edit"]);
    Route::delete("admin/blog/{id}/delete", [BlogController::class, "delete"]);

});

Route::get("/sample", [BlogController::class, "sample"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
