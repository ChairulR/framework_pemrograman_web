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

// New resourceful routes for product management (named 'products.*')
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create')->middleware(['auth','verified']);
    Route::post('/', [ProductController::class, 'store'])->name('store')->middleware(['auth','verified']);
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit')->middleware(['auth','verified']);
    Route::put('/{id}', [ProductController::class, 'update'])->name('update')->middleware(['auth','verified']);
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware(['auth','verified']);
});

// Legacy/compat routes kept for backward compatibility
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
    Route::post('/product', [ProductController::class, 'store'])->name('product-store');
});

// Old route pattern (kept): still forwards to controller but may be removed later
Route::get('/product/{angka}', [ProductController::class, 'index']);

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