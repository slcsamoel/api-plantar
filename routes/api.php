<?php

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\CampanhaController;
use App\Http\Controllers\CampanhaProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response('api on line',200);
});

Route::apiResource('grupos', GrupoController::class);

Route::apiResource('produtos', ProdutoController::class);

Route::apiResource('cidades', CidadeController::class);

Route::apiResource('campanhas', CampanhaController::class);

Route::post('vincular-produtos/{campanha}/{produto}',[CampanhaProdutoController::class , 'store']);
Route::get('produtos-campanha/{campanha}', [CampanhaProdutoController::class , 'produtosPorCampanha']);
Route::get('campanhas-produto/{produto}', [CampanhaProdutoController::class , 'campanhasPorProduto']);
