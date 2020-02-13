@extends('layout.app')
@section('title', 'Erro ao capturar POKEMON')

@section('content')
    <style>
        .erro{
            color:red;
            font-weight: bold
        }
        .alinharTexto{
            text-align:center;
        }
    </style>
    <h1 class="alinharTexto">Ops! Parece que algo deu errado :(</h1>
    <hr>

    <div class="container alinharTexto" >

        <h4 class="erro">Erro ao inserir item ! O registo inserido está duplicado</h4>
        <h5 >Tente inserir um Treinador diferente para o pokemon !</h5>
        <a href="{{ route('pokemons.index') }}" class="btn btn-info btn-sm">Voltar a página inicial</a>



    </div>
@endsection