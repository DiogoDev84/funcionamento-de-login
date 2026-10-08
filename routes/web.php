<?php
// Importa a classe Route, que registra as rotas (os itens do "cardápio")
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OlaController;
use App\Http\Controllers\LoginController;

// Route::get = "quando alguém ACESSAR (GET) este endereço..."
// '/'        = o endereço raiz, ou seja, http://localhost/
// function () { ... } = "...execute esta função"
Route::get('/', function () {

// view('welcome') = "devolva a view chamada welcome"
    return view('welcome');
});

// [OlaController::class, 'index'] = "quem atende é o OlaController, pelo método index"
//Route::get('/ola', [OlaController::class, 'index']);

// GET /login = MOSTRAR o formulário de login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// GET /dashboard = mostrar o painel
// ->middleware('auth') = coloca o "segurança" na porta:
// só deixa passar quem fez login
Route::get('/dashboard' , function() {
    return view ('dashboard');
})->middleware('auth'); 

Route::post('logout', [loginController::class, 'logout'])
->name('logout')
->middleware('auth');