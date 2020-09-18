@extends('master.layout')
<style>
    #pesq {
            display: block;
            width: 600px;
            height: 30px;
            margin: auto;
        }
        input#texto{
            text-indent: 10px;
            width: 500px;
            height: 30px;
            font-size: 14pt;
            border-radius: 10px 10px;
        }
        input#p{
            width: 50px;
            margin: 20px 0px;
            height: 35px;
            font-size: 14pt;
        }
        table {
            background-color: #f0f0f0;
            display: block;
            margin: auto;
            margin-top: 40px;
            border: 1px solid black;
            overflow-y: auto;
            width: 600px;
            border-spacing: 0px;
            border-radius: 10px;
            box-shadow: #636363 2px 2px 2px;
            height: auto;
        }
        tr {
            text-align: center;
            font-size: 14pt;
            font-family: Helvetica, sans-serif;
        }
        #titulos {
            background-color: #002b70;
            color: white;
            font-weight: bold;
            font-size: 20pt;
        }
        td {
            width: 150px;
            border: 1px solid black;
        }
</style>
@section('content')
        <div id="pesq">
            <form action="" method="get">
                <input type="text" name="valor" value="" id="texto">
                <input type="submit" value="P" id="p">
            </form>
        </div>
        <table>
        <tr id="titulos"><td>Cód.</td><td>Produto</td><td>Preço</td><td>Estoque</td></tr>
        @foreach($produtos as $prod)
            <tr>
                <td><a href="{{ route('prods.formedit', ['produto' => $prod->id]) }}">{{ $prod->cdb }}</a></td>
                <td>{{ $prod->produto }}</td>
                <td>{{ $prod->preco }}</td>
                @if($prod->estoque === 0)
                    <td style="color: red; font-weight: bold;">{{ $prod->estoque }} !</td>
                @else
                    <td>{{ $prod->estoque }}</td>
                @endif

            </tr>
        @endforeach
        </table>
@endsection
