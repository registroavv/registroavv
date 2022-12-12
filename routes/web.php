<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AVVController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\SaimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RedesController;
use App\Http\Controllers\FMHController;
use App\Http\Controllers\MinutaController;
use App\Http\Controllers\DataTableController;
use App\exports\AVVsExport;

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

Auth::routes();

Route::get('/buscar', [AVVController::class, 'buscar'])->name('avv.buscar');
Route::post('/avv/buscaravv/', [AVVController::class, 'buscaravv'])->name('buscaravv');

Route::get('/', function () {return view('welcome');});
Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'index'])->name('home');
    

Route::get('/avv/estado/municipio/{id}', [GeoController::class, 'municipio'])->name('municipios');
Route::get('/avv/municipio/parroquia/{id}', [GeoController::class, 'parroquia'])->name('parroquias');
Route::post('/avv/buscarcedula/', [SaimeController::class, 'buscarcedula'])->name('buscarcedula');
Route::get('/avv/minuta/{id}', [MinutaController::class, 'buscarminuta'])->name('buscarminuta');
Route::view('/powergrid', 'powergrid-demo');
Route::get('/datatable/avvs', [DataTableController::class, 'avvs'])->name('datatable.avvs');

// Route::get('/avv/excel', [AVVController::class, 'excel'])->name('avv.excel');
Route::get('/avv/excelestado', [AVVController::class, 'excelestado'])->name('avv.excelestado');

// TODOS LOS USUARIOS AUTENTICADOS
Route::middleware(['auth'])->group(function (){
    Route::get('/avv/', [AVVController::class, 'index'])->name('avv.index');
    Route::get('/avv2/', [AVVController::class, 'indexavv'])->name('avv.indexavv');
    Route::get('/avv3/', [AVVController::class, 'avv'])->name('avv.avv');
    Route::get('/avv4/', [AVVController::class, 'avvs'])->name('avv.avvs');
    Route::get('/avv/{id}/edit', [AVVController::class, 'edit'])->name('avv.edit');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/avv/mostrar', [AVVController::class, 'mostrar'])->name('avv.mostrar');
    Route::get('/avv/{id}/pdf', [AVVController::class, 'pdf'])->name('avv.pdf');
    Route::get('/avv/{id}/show', [AVVController::class, 'show'])->name('avv.show');
    Route::post('/avv/{id}/update', [AVVController::class, 'update'])->name('avv.update');
});


// TODOS LOS USUARIOS AUTENTICADOS NACIONALES (REDES NACIONAL, INTU NACIONAL, FMH NACIONAL)
Route::middleware(['auth','nacional'])->group(function (){
    Route::get('/maps', [AVVController::class, 'maps'])->name('avv.maps');
    Route::get('/avv/excel', [AVVController::class, 'excel'])->name('avv.excel');
});

//TODOS LOS USUARIOS ATENTICADOS NACIONALES DE REGISTRO (REDES NACIONAL)
Route::middleware(['auth', 'nacional','registro'])->group(function () {
    Route::delete('/avv/{id}', [AVVController::class, 'destroy'])->name('avv.delete');
    //Route::get('/avv/excel', [AVVController::class, 'excel'])->name('avv.excel');   
});

//TODOS LOS USUARIOS AUTENTICADOS DE REGISTRO (REDES ESTADAL Y NACIONAL)
Route::middleware(['auth', 'registro'])->group(function () {
    Route::get('/avv/create', [AVVController::class, 'create'])->name('avv.create');
    Route::post('/avv/save', [AVVController::class, 'save'])->name('avv.save');
});

Route::middleware(['auth', 'participacion'])->group(function () {
    
});

/*
|--------------------------------------------------------------------------
| RUTAS REGISTRO DE AVV ADMINISTRADOR
|--------------------------------------------------------------------------*/ 
Route::middleware(['auth','admin','redes'])->group(function (){

});

/*
|--------------------------------------------------------------------------
| RUTAS SAIME ADMINISTRADOR
|--------------------------------------------------------------------------*/
Route::middleware(['auth','admin'])->group(function (){
    Route::get('/saime', [SaimeController::class, 'index'])->name('saime.index');
    Route::get('/saime/{id}/edit', [SaimeController::class, 'editar'])->name('saime.editar');
    Route::get('/saime/crear', [SaimeController::class, 'crear'])->name('saime.crear');
    Route::post('/saime/guardar', [SaimeController::class, 'guardar'])->name('saime.guardar');
    Route::delete('/saime/{id}',[SaimeController::class, 'destroy'])->name('saime.delete');
    Route::post('/saime/{id}/update',[SaimeController::class, 'actualizar'])->name('saime.update');
});

/*
|--------------------------------------------------------------------------
| RUTAS USUARIOS
|--------------------------------------------------------------------------*/
Route::middleware(['auth','admin'])->group(function (){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
});




/*
|--------------------------------------------------------------------------
|  RUTAS USUARIO FMH
|--------------------------------------------------------------------------*/
Route::middleware(['fmh'])->group(function (){
});



/*
|--------------------------------------------------------------------------
|  RUTAS REGISTRO AVV USUARIO REDES
|--------------------------------------------------------------------------*/
Route::middleware(['auth','redes'])->group(function (){
    // Route::get('/avv/{id}/edit', [RedesController::class, 'edit'])->name('redes.avv.edit');
    // Route::post('/avv/{id}/update', [RedesController::class, 'update'])->name('avv.update');
    // Route::post('/avv/save', [RedesController::class, 'save'])->name('avv.save');
    // Route::delete('/avv/{id}', [RedesController::class, 'destroy'])->name('avv.delete');
    // Route::get('/changeStatus', [RedesController::class, 'changeStatus'])->name('avv.changeStatus');
    // Route::get('/subambitos/list/{id}', [RedesController::class, 'ListSubAmbitos'])->name('avv.subambitos');
    // Route::get('/redes/excel', [RedesController::class, 'excel'])->name('avv.excel');


    //Route::get('/home', [RedesController::class, 'home'])->name('home');

});