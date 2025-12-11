<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Catalogue produits
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Catégories
Route::get('/categories/{category:slug}', [ProductController::class, 'category'])->name('categories.show');

// Panier (authentification requise)
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Affichage du panier
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add'); // Ajout d'un produit au panier
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update'); // Mise à jour de la quantité d'un produit dans le panier
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove'); // Suppression d'un produit du panier
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // Vidage du panier
});



/*

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
