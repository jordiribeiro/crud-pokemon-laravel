@extends('layout.app')
@section('title', 'POKEDEX LIST')

@section('content')

    <h1 style="margin-left:70%">Pokemons Capturados</h1>
    <div class="container">
        <table class="table table-bordered table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Pokemom</th>
                <th>Treinador</th>
                <th>Forca (CP)</th>
                <th>Tipo pokemon</th>
                <th>
                    <a href="{{ route('pokemons.create')}}" class="btn btn-success btn-sm" >Inserir</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($pokemons as $poke)
                <tr>
                    <td>{{ $poke->id }}</td>
                    <td>{{ $poke->nome_pokemon }}</td>
                    <td>{{ $poke->treinador }}</td>
                    <td>{{ $poke->forca }}<a>CP</a></td>
                    <td>{{ $poke->tipo_pokemon }}</td>
                    <td>
                        <a href="{{ route('pokemons.edit', ['id' => $poke->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="{{ route('pokemons.destroy', ['id' => $poke->id]) }}" style="display: inline" onsubmit="return confirm('Tem certeza que vai descartar esse Pokemon ?');" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="_method" value="delete" >
                            <button class="btn btn-danger btn-sm">Descartar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Você ainda não capturou nenhum pokemon:<a id="insh"></a></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <!--Paginação-->
        {{ $pokemons->links() }}
    </div>
@endsection