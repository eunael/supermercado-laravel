<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #bdbdbd;
        }
        header {
            display: block;
            margin-top: -10px;
            width: 101.3%;
            height: 90px;
            margin-left: -10px;
            background-color: #002b70;
        }
        nav {
            display: block;
            margin: 0px auto;
            width: 30%;
            height: 60px;
        }
        nav ul{
            display: flex;
            list-style: none;
        }
        li{
            margin-top: 30px;
            display: block;
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
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('vendas') }} " class="rotas">Vendas</a></li>
                <li><a href="{{ route('prods') }}" class="rotas">Produtos</a></li>
                <li><a href="{{ route('prods.formcad') }}" class="rotas">Cadastro</a></li>
            </ul>
        </nav>
    </header>
    <main role="main" class="container">
    @yield('content')
    </main>
</body>
</html>
