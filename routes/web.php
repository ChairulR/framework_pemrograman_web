<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/product', [ProductController::class, 'index']);

Route::get('/route_cont/{id}', [ProductController::class, 'show']);     

Route::get('/langganan', function () {
    return view('langganan');
});

Route::get('/barang/{id}', function ($id) {
    $isi_data = "" . $id;
    return view('barang', compact('isi_data'));
});

// Routes untuk UTS
Route::get('/uts', function () {
    return view('uts_isi');
})->name('uts.main');

Route::get('/uts/pemrograman-web', function () {
    return view('uts_pemrograman_web');
})->name('uts.pemrograman-web');

Route::get('/uts/database', function () {
    return view('uts_database');
})->name('uts.database');

require __DIR__.'/auth.php';