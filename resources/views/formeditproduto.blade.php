<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        body {
            background-color: #bdbdbd;
        }
        nav {
            display: block;
            margin-top: -10px;
            margin-left: -10px;
            width: 101.3%;
            height: 90px;
            background-color: #002b70;
        }
        #naveg {
            margin: 35px 0px 0px 20px;
            display: inline-block;
        }
        a.rotas {
            margin: 0px 10px 0px 10px;
            padding: 10px;
            background-color: #4367a1;
            border-radius: 10px;
            box-shadow: rgba(0,0,0,.5) 2px 2px 2px;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: none;
        }
        section{
            position: relative;
            background-color: white;
            box-shadow: rgba(0,0,0,.5) 5px 5px 5px;
            margin: auto;
            margin-top: 20px;
            width: 750px;
            height: 400px;
            border-radius: 10px;
        }
        aside{
            background-color: #6e6e6e;
            display: block;
            float: left;
            width: 22%;
            height: 100%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            box-shadow: rgba(0,0,0,.5) 2px 0px 1px;
            /* border-right: 1px solid black; */
        }
        img{
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 115px;
            height: 115px;
            border: 5px solid black;
        }
        article{
            position: relative;
            display: block;
            float: right;
            width: 77%;
            height: 100%;
            /* border-left: 1px solid black; */
        }
        form#atualiz{
            width: 450px;
            height: 100%;
            margin: auto;
            margin-top: 15px;
            text-align: center;
        }
        form#atualiz fieldset{
            display: block;
            height: 65px;
        }
        form#atualiz legend{
            font: normal bold 16pt Arial, sans-serif;
        }
        form#atualiz p{
            margin-top: auto;
            color: #8c8c8c;
            font: normal bold 16pt Arial, sans-serif;
        }
        form#atualiz input{
            text-indent: 5px;
            margin: auto;
            width: 200px;
            height: 30px;
            font-size: 14pt;
        }
        form#atualiz input.subm{
            text-indent: 0px;
            margin-top: 5px;
            font-weight: bold;
        }
        div#popup {
            background-color: #bababa;
            position: absolute;
            display: block;
            width: 350px;
            height: 200px;
            top: -350px; /*90px; -350px*/
            left: 20%;
        }
        form#delet{
            width: 50%;
            height: 100%;
            margin: auto;
            margin-top: 15px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        form#delet h4{
            color: #8c8c8c;
            margin-bottom: 10px;
        }
        form#delet input{
            width: 100px;
            height: 30px;
            margin-bottom: 5px;
            font-size: 14pt;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav>
        <div id="naveg">
            <a href="{{ route('prods') }}" class="rotas">Voltar</a>
        </div>
    </nav>
    <main>
        <section>
            <aside>
                <img src="" alt="">
            </aside>
            <article>
                <form id="atualiz" action="{{ route('prods.edit', ['produto' => $produto->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <legend>Cód. de barras</legend>
                        <p>{{ $produto->cdb }}</p>
                    </fieldset>
                    <fieldset>
                        <legend>Produto</legend>
                        <input type="text" name="produto" value="{{ $produto->produto }}">
                    </fieldset>
                    <fieldset>
                        <legend>Preço</legend>
                        <input type="number" name="preco" step="any" min="0" value="{{ $produto->preco }}">
                    </fieldset>
                    <fieldset>
                        <legend>Estoque</legend>
                        <input type="number" name="estoque" min="0" value="{{ $produto->estoque }}">
                    </fieldset>
                    <input type="submit" class="subm" value="Salvar">
                    <input type="button" id="delet" class="subm" value="Deletar" onclick="movePopup(0)">
                </form>
                <div id="popup">
                    <form id="delet" action="{{ route('prods.delet', ['produto' => $produto->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <h2>Tem certeza de deseja deletar?</h2>
                        <h4>#{{ $produto->cdb }} {{ $produto->produto }}</h4>
                        <input type="submit" value="Ok">
                        <input type="button" id="canc" value="Cancelar" onclick="movePopup(1)">
                    </form>
                </div>
            </article>
        </section>
    </main>
    <script>
        let popup = document.querySelector('#popup')
        function movePopup(num){
            if(num == 0){
                popup.style.top = '90px';
            } else if(num == 1){
                popup.style.top = '-350px';
            }
        }

    </script>
</body>
</html>
