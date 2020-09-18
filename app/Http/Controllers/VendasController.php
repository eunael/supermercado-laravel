<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class VendasController extends Controller
{

    public function atualiEstoque($cdb, $qnt){
        $prod = new Produto();
        $p = $prod->where('cdb', '=', $cdb)->first();
        if($p->estoque >= $qnt){
            $p->estoque -= $qnt;
            $p->save();
        }
    }
    public function calcValor($cdb, $qnt, $tot){
        $produtos = new Produto();
        $prod = $produtos->where('cdb', '=', $cdb)->first();
        if($prod){
            $total = $prod->preco * $qnt + $tot;
            return $total;
        } else{
            return false;
        }
    }

    public function painelVendas(Request $request){
        $tot = $request->query('tot');
        return view('vendas.painelvendas', ['tot' => $tot]);
    }

    public function analise(Request $request){

        if(!empty($request->cdb) and !empty($request->qnt)){
            $cdb = intval($request->cdb);
            $qnt = intval($request->qnt);
            $tot = floatval($request->tot);
            $total = $this->calcValor($cdb, $qnt, $tot);
            if($total){
                $this->atualiEstoque($cdb, $qnt);
                return redirect()->route('vendas', ['tot' => $total]);
            } else{
                return redirect()->back()->withErrors(['Esse Código de Barras não existe.']);
            }
        } else {
            return redirect()->back()->withErrors(['Não foi informado valor(es) ao(s) campo(s).']);
        }

    }
}
