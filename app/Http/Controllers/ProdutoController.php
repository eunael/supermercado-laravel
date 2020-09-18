<?php

namespace App\Http\Controllers;

use App\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /** TODOS OS PRODUTOS */
    public function mostraProdutos(Request $request){
        if(empty($request->valor)){
            $produtos = Produto::all();
        }
        else {
            $v = str_replace(',', '.', $request->valor);
            $valor = is_numeric($v)? floatval($v) : ucfirst($v);
            if(is_string($valor)){
                $produtos = Produto::where('produto', 'like', $valor.'%')->get();
            } elseif(is_float($valor)){
                $produtos = Produto::where('preco', '=', $valor)->get();
            }
        }

        return view('mostraprodutos', ['produtos' => $produtos]);
    }

    /** NOVO PRODUTO */
    public function formCadastro(){

        return view('formcadprodutos');
    }
    public function cadastrado(Request $request){
        $produto = new Produto();
        try {
            $produto->cdb = $request->cdb;
            $produto->produto = ucfirst($request->produto);
            $produto->preco = $request->preco;
            $produto->estoque = $request->estoque;
            $produto->save();
            return redirect()->route('prods');
        } catch(Exception $e){

            return redirect()->back()->withErrors(['Algum campo não foi informado ou esse produto já existe.']);
        }
    }

    /** PRODUTOS ESPECÍFICO */
    public function formEditaProduto(Produto $produto){
        return view('formeditproduto', ['produto' => $produto]);
    }
    /** */
    public function atualizado(Request $request, Produto $produto){
        $produto->produto = ucfirst($request->produto);
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->save();

        return redirect()->route('prods');
    }
    /** */
    public function deletar(Produto $produto){
        $produto->delete();

        return redirect()->route('prods');
    }

}
