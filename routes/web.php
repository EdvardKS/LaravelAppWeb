<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\EncargoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;


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
Route::fallback(function () {
    return redirect('/');
});

Route::get('/', [PublicController::class, "home"])->name("home");

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/encargar', [PublicController::class, "makeOrder"])->name("makeOrder");

Route::get('/nosotros', [PublicController::class, "whoWeAre"])->name("whoWeAre");

Route::get('/contacto', [PublicController::class, "contact"])->name("contact");

// En está ruta llamamos directamente a la lógica del programa de ProductController y devuelve la vista y le pasa sus datos
Route::get('/productos',  [CategoryController::class, "index"])->name("categories");

// En está ruta llamamos directamente a la lógia ProductController pero le pasamos el parametro de que categoria
// Route::get('/products/category',  [ProductController::class, "getOneCategoryProducts"])->name("products");

Route::get('/Faqs', [PublicController::class, "faqs"])->name("faqs");

Route::get('/politicas-privacidad', [PublicController::class, "privacyPolices"])->name("privacyPolices");

Route::get('/politicas-cookies', [PublicController::class, "privacyCookies"])->name("privacyCookies");

Route::get('/aviso-legal', [PublicController::class, "legalWarning"])->name("legalWarning");

Route::get('/unsubscribe', [PublicController::class, "unsubscribe"])->name("unsubscribe");

Route::get("/sitemap", [PublicController::class, "sitemap"])->name("sitemap");


Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::post('/enviar-correo', [PublicController::class, 'enviarCorreo'])->name('enviarCorreo');

Route::get("/mapa-web", [PublicController::class, "sitemap"])->name("sitemap");

Auth::routes(["register" => false]);

Route::post('/encargos', [EncargoController::class, 'store'])->name('encargos.store');
Route::put('/encargos/{encargo}/entregado', [EncargoController::class, 'entregado'])->name('encargos.entregado');
Route::get('/get-opening-hours/{date}', [DaysController::class, 'getOpeningHours']);

Route::middleware(["auth"])->group(function () {
    Route::get('/panel', [HomeController::class, 'index'])->name('panel');
    //Crud Productos
    Route::resource('/panel/products', ProductController::class);
    Route::put('/panel/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/panel/productos/{id}', [ProductController::class, 'borrado'])->name('products.borrado');
    
    //Crud Categorias
    Route::resource('/panel/categories', CategoryController::class);
    Route::get('/panel/categories', [CategoryController::class, 'indexCrud'])->name('categories.indexCrud');
    Route::put('/panel/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/panel/categories/{id}/borrado', [CategoryController::class, 'borrado'])->name('categories.borrado');
    
    //Settings
    Route::get('/panel/home-settings', [PublicController::class, "showSettings"])->name('settings.index');
    Route::post('/panel/home-settings', [PublicController::class, "saveSettings"])->name('settings.index');
    
    //Encargos
    Route::resource('/panel/encargos', EncargoController::class)->except('store');
    // Route::post('/encargos', [EncargoController::class, 'store'])->name('encargos.store');
    Route::post('/encargos/storePanel', [EncargoController::class, 'storePanel'])->name('encargos.storePanel');
    Route::get('/encargos/refresh', [EncargoController::class, 'refresh'])->name('encargos.refresh');
    Route::put('/panel/encargos/{encargo}/entregado', [EncargoController::class, 'entregado'])->name('encargos.entregado');

    //Calendario
    Route::get('/panel/days', [DaysController::class, 'index'])->name('days.index');
    Route::post('/panel/days', [DaysController::class, 'store'])->name('days.store');
    Route::get('/panel/days/list', [DaysController::class, 'list'])->name('days.list');
    Route::delete('/panel/days/{day}', [DaysController::class, 'destroy'])->name('days.destroy');
    Route::get('/days/{id}/edit', [DaysController::class, 'edit'])->name('days.edit');
    Route::put('/panel/days/{id}', [DaysController::class, 'update'])->name('days.update');
    Route::post('/panel/update_horarios', [DaysController::class, 'update_horarios'])->name('days.update_horarios');


    //Newsletter
    Route::get('/panel/newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
    Route::post('/panel/newsletters/send', [NewsletterController::class, 'send'])->name('newsletters.send');


});

Auth::routes();

Route::get('/panel', [App\Http\Controllers\HomeController::class, 'index'])->name('panel');
