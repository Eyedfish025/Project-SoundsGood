<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AtividadesController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');

Route::get('/index', [AtividadesController::class, 'index'])->name('atividades.index');

Route::get('/respiracao', [AtividadesController::class, 'respiracao'])->name('atividades.respiracao');

Route::get('/meditacao', [AtividadesController::class, 'meditacao'])->name('atividades.meditacao');

Route::get('/alongamento', [AtividadesController::class, 'alongamento'])->name('atividades.alongamento');

Route::get('/sons-calmantes', [AtividadesController::class, 'sonsCalmantes'])->name('atividades.sons-calmantes');



Route::get('/respiracao/4-7-8', [AtividadesController::class, 'respiracao_478'])->name('atividades.respiracao.4-7-8');

Route::get('/respiracao-Diafragmatica', [AtividadesController::class, 'respiracao_Diafragmatica'])->name('atividades.respiracao-Diafragmatica');

Route::get('/respiracao-Alternada-Nasal', [AtividadesController::class, 'respiracao_Alternada_Nasal'])->name('atividades.respiracao-Alternada-Nasal');

Route::get('/respiracao-Quadrada', [AtividadesController::class, 'respiracao_Quadrada'])->name('atividades.respiracao-Quadrada');



Route::get('/alongamento-Dinamico', [AtividadesController::class, 'alongamento_Dinamico'])->name('atividades.alongamento-Dinamico');

Route::get('/alongamento-Estatico', [AtividadesController::class, 'alongamento_Estatico'])->name('atividades.alongamento-Estatico');

Route::get('/alongamento-Passivo', [AtividadesController::class, 'alongamento_Passivo'])->name('atividades.alongamento-Passivo');

Route::get('/alongamento-Ativo', [AtividadesController::class, 'alongamento_Ativo'])->name('atividades.alongamento-Ativo');