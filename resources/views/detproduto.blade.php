<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
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
            margin: auto;
            margin-top: 20px;
            width: 750px;
            height: 400px;
        }
        aside{
            display: block;
            float: left;
            width: 150px;
            height: 100%;
            border-right: 1px solid black;
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
                <p>a</p>
            </aside>
            <article>
                <h2>Cód. de barras: </h2>{{ $produto->cdb }}
                Produto: <p>{{ $produto->produto }}</p>
                Preço: <p>{{ $produto->preco }}R$</p>
                Estoque: <p>{{ $produto->estoque }}</p>
                <a href="{{ route('prods.formedit', ['produto' => $produto->id]) }}">Editar</a>
            </article>
        </section>

    </main>

</body>
</html>
