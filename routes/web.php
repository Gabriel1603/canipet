<?php

use App\Http\Controllers\ProfileController;
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

function criarRota($classe)
{
    // Define o namespace do controller com base no nome da classe
    $controller = "App\\Http\\Controllers\\" . $classe . 'Controller';
    
    // Define o nome padrão da rota com base na classe (pluralizada)
    $rota = $classe . 's';

    // Gera rotas de CRUD para o recurso
    Route::get("/$rota", ['uses' => "$controller@index"])->name("$rota.index"); // Rota para listar recursos
    Route::get("/$rota/create", ['uses' => "$controller@create"])->name("$rota.create"); // Rota para exibir o formulário de criação
    Route::post("/$rota/db", ['uses' => "$controller@db"])->name("$rota.db"); // Rota para salvar os dados no banco
}

criarRota('Pet');
criarRota('Adotante'); 
criarRota('LarTemporario');

//Rotas com login obrigatório, sobreescrever aqui abaixo
Route::get("/Pets/create", ['middleware' => 'auth', 'uses' => "App\\Http\\Controllers\\PetController@create"]);
Route::get("/Adotantes", ['middleware' => 'auth', 'uses' => "App\\Http\\Controllers\\AdotanteController@index"]);


//Rotas Gerais
Route::get("/", ['uses' => "App\\Http\\Controllers\\PetController@index"]); 
Route::get("/api/pets", ['uses' => "App\\Http\\Controllers\\PetController@getPets"]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return redirect('/');
});

require __DIR__.'/auth.php';
