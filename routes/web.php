<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnidadController;
use App\Models\Curso;
use App\Models\Libro;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/limpiar-cache', function () {
    
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'ok';
    // Artisan::call('storage:link');
    // Artisan::call('key:generate');
    // Artisan::call('migrate:fresh --seed');
});



Route::get('/', function () {
    $data = array(
        'cursos'=>Curso::get()
    );
    return view('welcome',$data);
})->name('welcome');



Route::get('/dashboard', function () {
    $data = array(
        'cursos'=>Curso::get()
    );
    return view('dashboard',$data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    


    Route::resource('unidades',UnidadController::class);
    Route::get('unidad/{curso}',[UnidadController::class,'index2'])->name('unidad.index2');
    Route::post('unidad-guardar',[UnidadController::class,'store'])->name('unidad.guardar');
    Route::post('unidad-guardar-sub',[UnidadController::class,'storeSub'])->name('unidad.guardar-sub');
    

    Route::resource('libros',LibroController::class);
    Route::get('libro-crear/{unidad}',[LibroController::class,'crear'])->name('libro.crear');

});

require __DIR__.'/auth.php';

