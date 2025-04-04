<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryMovementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('products.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
     // Your protected routes
     Route::resource('products', ProductController::class);
    
     Route::get('/products/{product}/inventory/create', [InventoryMovementController::class, 'create'])
         ->name('inventory.create');
     Route::post('/products/{product}/inventory', [InventoryMovementController::class, 'store'])
         ->name('inventory.store');

     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
