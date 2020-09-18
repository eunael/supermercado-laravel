<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/consulta', 'ProdutoController@mostraProdutos')->name('prods');
Route::get('/produtos/cadastro', 'ProdutoController@formCadastro')->name('prods.formcad');
Route::get('/produtos/edita/{produto}', 'ProdutoController@formEditaProduto')->name('prods.formedit');
Route::get('/produtos/vendas', 'VendasController@painelVendas')->name('vendas');

Route::post('/produtos/cadastro/cadastrado', 'ProdutoController@cadastrado')->name('prods.cad');
Route::post('/produtos/vendas/analise', 'VendasController@analise')->name('vendas.anali');

Route::put('/produtos/edita/editadado/{produto}', 'ProdutoController@atualizado')->name('prods.edit');

Route::delete('/produtos/deletar/{produto}', 'ProdutoController@deletar')->name('prods.delet');
