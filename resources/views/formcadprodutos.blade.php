@extends('master.layout')
<style>
    div#main{
        position: relative;
        background-color: white;
        box-shadow: rgba(0,0,0,.5) 5px 5px 5px;
        margin: auto;
        margin-top: 20px;
        width: 750px;
        height: 400px;
        border-radius: 10px;
    }
    form#cadastro{
        width: 450px;
        height: 100%;
        margin: auto;
        text-align: center;
    }
    form#cadastro fieldset{
        display: block;
        height: 65px;
    }
    form#cadastro legend{
        font: normal bold 16pt Arial, sans-serif;
    }
    form#cadastro p{
        margin-top: auto;
        color: #8c8c8c;
        font: normal bold 16pt Arial, sans-serif;
    }
    form#cadastro input{
        text-indent: 5px;
        margin: auto;
        width: 200px;
        height: 30px;
        font-size: 14pt;
    }
    form#cadastro input#cad{
        text-indent: 0px;
        margin-top: 8px;
        font-weight: bold;
    }
    .alerta{
        background-color: rgba(235, 64, 52,.5);
        border: 3px solid rgb(235, 64, 52);
        border-radius: 15px;
        display: block;
        margin: auto;
        margin-top: 10px;
        width: 750px;
        height: 50px;
        text-align: center;
    }
    .alerta p{
        text-indent: 12px;
        font: normal normal 12.13pt 'Gill Sans', sans-serif;
    }
</style>
@section('content')
@if($errors->all())
    @foreach($errors->all() as $error)
        <div class="alerta" role="alert">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif
<div id="main">
    <form id="cadastro" action="{{ route('prods.cad') }}" method="post">
        @csrf
        <fieldset>
            <legend>Cód. de barras</legend>
            <input type="number" name="cdb" size="4" min="0" placeholder="Cód. de Barras">
        </fieldset>
        <fieldset>
            <legend>Produto</legend>
            <input type="text" name="produto" placeholder="Produto">
        </fieldset>
        <fieldset>
            <legend>Preço</legend>
            <input type="number" name="preco" step="any" min="0" placeholder="Preço">
        </fieldset>
        <fieldset>
            <legend>Estoque</legend>
            <input type="number" name="estoque" min="0" placeholder="Estoque">
        </fieldset>
        <input type="submit" id="cad" value="Cadastrar">
    </form>
</div>
@endsection
