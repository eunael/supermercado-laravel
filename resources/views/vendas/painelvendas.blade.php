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
        text-align: center;
    }
    form#vendas{
        width: 450px;
        height: 75%;
        margin: auto;
        text-align: center;
    }
    form#vendas fieldset{
        display: block;
        height: 65px;
    }
    form#vendas legend{
        font: normal bold 16pt Arial, sans-serif;
    }
    form#vendas p{
        margin-top: auto;
        color: #8c8c8c;
        font: normal bold 16pt Arial, sans-serif;
    }
    form#vendas input{
        text-indent: 5px;
        margin: auto;
        width: 200px;
        height: 30px;
        font-size: 14pt;
    }
    form#vendas input#tot{
        visibility: hidden;
        width: 0px;
        height: 0px;
    }
    form#vendas input#subm{
        visibility: hidden;
        width: 0px;
        height: 0px;
    }
    #final{
        text-indent: 5px;
        width: 200px;
        height: 30px;
        font-size: 14pt;
    }
    div#popup {
        background-color: #bababa;
        position: absolute;
        display: block;
        width: 350px;
        height: 200px;
        top: -450px; /*90px; -450px*/
        left: 20%;
    }
    #pop{
        display: grid;
        grid-template-rows: repeat(3, 1fr);
        padding: 10px;
        gap: 20px;
    }
    #pop div:nth-child(1){
        text-align: right;
    }
    #pop label{
        font: normal bold 12pt Arial, sans-serif;
    }
    #pop .buts{
        font: normal bold 12pt Arial;
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
    <form id="vendas" action="{{ route('vendas.anali') }} " method="post">
        @csrf
        <fieldset>
            <legend>Cód. de barras</legend>
            <input type="number" name="cdb" size="4" min="0" placeholder="Cód. de Barras">
        </fieldset>
        <fieldset>
            <legend>Quantidade</legend>
            <input type="text" name="qnt" placeholder="Quantidade">
        </fieldset>
        <fieldset>
            <legend>Total</legend>
            <input type="number" name="tot" step="any" min="0" id="tot" value="{{ $tot ?? 0 }}">
            <p>R$ {{ $tot ?? 0 }}</p>
        </fieldset>
        <input type="submit" id="subm" value="submeter">
    </form>

    <div>
        <input type="button" id="final" value="Finalizar" onclick="movePopup(0)">
    </div>
    <div style="text-align: right; margin-right: 20px">
        <a href="{{ route('vendas', ['tot' => 0]) }}">limpar</a>
    </div>
    <div id="popup">
        <div id="pop">
            <div>
               <input type="button" value="x" class="buts" onclick="movePopup(1)">
            </div>
            <div>
                <label for="pago">Recebido: </label><input type="number" step="any" id="pago">
            </div>
            <div>
                <label>Troco: </label><span id="troco"> </span>
            </div>
            <input type="button" value="Calcular" class="buts" onclick="troco()">
        </div>
    </div>
</div>
@endsection
<script>

    function troco(){
        let total = document.getElementById('tot')
        let pago = document.getElementById('pago')
        let troco = document.getElementById('troco')

        let trocado = pago.value - total.value
        troco.innerHTML = `R$ ${trocado}`
    }

    function movePopup(num){
        let popup = document.querySelector('#popup')
        let pago = document.getElementById('pago')
        let troco = document.getElementById('troco')
        if(num == 0){
            popup.style.top = '90px';
        } else if(num == 1){
            pago.value = ""
            troco.innerHTML = " "
            popup.style.top = '-450px';
        }
    }
</script>
