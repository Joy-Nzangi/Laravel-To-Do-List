<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaystackController;

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
//Payment gateway
Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
Route::get('success', [PaystackController::class, 'success'])->name('success');
Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');






Route::get('/', function () {
    //Relationship with user and list item
    $posts = [];
    if (auth()->check()){
        
    // $todos = auth()->user()->coolTodos()->latest()->get();
    }

    return view('welcome', ['todos' => $todos]);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

//Pointing to TodoController.php index function 
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

//post request used to store info on the database
Route::post('/', [TodoController::class, 'store'])->name('todos.store');

//PATCH route
Route::patch('/{todo}', [TodoController::class, 'update'])->name('todos.update');

// Edit route
Route::get('/edit/{todo}', [TodoController::class, 'edit']);

//DELETE data
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

// Update route
Route::patch('/update/{todo}', [TodoController::class, 'update'])->name('todos.update.update');

// Route for sorting
Route::get('/todos/sort', [TodoController::class, 'indexWithSorting'])->name('todos.sort');

// CHECK button toggle
Route::patch('/toggle/{todo}', [TodoController::class, 'toggleStatus'])->name('todos.toggle');


// Breeze authentication routes for authenticating a user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
