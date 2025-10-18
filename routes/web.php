<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','RoleCheck:admin,owner'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/rahasia', function () {
    return 'ini halaman rahasia';
})->middleware(['auth','verified','RoleCheck:admin,owner'])->name('rahasia');

Route::get('/produk/{parameter}', [ProductController::class, 'checkOddEven']);

Route::get('/product/detail/{id}', [ProductController::class, 'show']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
    Route::post('/product', [ProductController::class, 'store'])->name('product-store');
    // Product master routes (index, edit, update, destroy)
    Route::get('/product', [ProductController::class, 'index'])->name('product-index');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product-destroy');
});

// Dedicated route for numeric check (legacy behavior moved here)
Route::get('/product/check/{parameter}', [ProductController::class, 'checkOddEven'])->name('product-check');

Route::get('/langganan', function () {
    return view('langganan');
});

Route::get('/barang/{id}', function ($id) {
    $isi_data = "" . $id;
    return view('barang', compact('isi_data'));
});

// Route UTS pakai Controller
Route::get('/uts', [UtsController::class, 'index'])->name('uts.index');
Route::get('/uts/pemrograman-web', [UtsController::class, 'pemrogramanWeb'])->name('pemrogramanWeb');
Route::get('/uts/database', [UtsController::class, 'database'])->name('database');

require __DIR__.'/auth.php';