@extends('layout.app')
@section('title', 'POKEDEX REGISTER')

@section('content')
    <h1 style="margin-left:70%">Adicionar Pokemon ao POKEDEX</h1>


    <div class="container">

        <!-- #TIP
            isset é usado para verificar se o objeto cliente está instanciado e  não nulo
            Neste caso é verificado se o objeto já existe:
            -Se existir ele pode ser atualizado;
            -Se não existir ele é criado;
        -->
        @if(isset($pokemon))

            {!! Form::model($pokemon, ['method' => 'put', 'route' => ['pokemons.update', $pokemon->id ], 'class' => 'form-horizontal']) !!}

        @else

            {!! Form::open(['method' => 'post','route' => 'pokemons.store', 'class' => 'form-horizontal']) !!}

        @endif

        <div class="card">
            <div class="card-header">
      <span class="card-title">
          @if (isset($pokemon))
              Editando registro: {{ $pokemon->id }} #  Nome {{ $pokemon->nome_pokemon }}
          @else
              Inserindo novo registro na Pokedex
          @endif
      </span>
            </div>
            <div class="card-body">
                <div class="form-row form-group">

                    {!! Form::label('nome_pokemon', 'Pokemon',
                                        ['class' => 'col-form-label col-sm-2 text-right']) !!}

                    <div class="col-sm-4">

                        {!! Form::text('nome_pokemon', null,
                                        ['class' => 'form-control', 'placeholder'=>'Digite o nome do Pokemon...']) !!}

                    </div>

                </div>
                <div class="form-row form-group">

                    {!! Form::label('treinador', 'Treinador',
                                    ['class' => 'col-form-label col-sm-2 text-right']) !!}

                    <div class="col-sm-4">

                        {!! Form::text('treinador', null,
                                        ['class' => 'form-control', 'placeholder'=>'Digite o nome do Treinador...']) !!}

                    </div>

                </div>
                <!-- #TIP
                 Utilizei o selectRange do LaravelCollective Forms
                 para fazer uma seleção do campo força e "evitar"
                 o usuário de digitar String em um campo INT
               -->
                <div class="form-row form-group">

                    {!! Form::label('forca', 'Força do Pokemon',
                                    ['class' => 'col-form-label col-sm-2 text-right']) !!}

                    <div class="col-sm-8">

                        {!! Form::selectRange('forca',1,10000,
                                             ['class' => 'form-control',
                                             'autocomplete' => 'off',
                                             'value' =>  isset($pokemon) ? $pokemon->forca : 1
                                            ]) !!}

                    </div>

                </div>

                <!-- #TIP
                   Utilizei o select do LaravelCollective Forms
                   para fazer um DropDown de tipos de pokemon,
                   no caso de ser uma edição do pokemon
                   o tipo existente é inserido no value
                 -->
                <div class="form-row form-group">

                    {!! Form::label('tipo_pokemon',
                                    'Tipo do Pokemon',
                                    ['class' => 'col-form-label col-sm-2 text-right']) !!}

                    <div class="col-sm-10">
                        {!! Form::select('tipo_pokemon',
                                    ['Dark' => ['dark' => 'Dark'],'Rock' => ['rock' => 'Rock'],'Ligth' => ['ligth' => 'Ligth'],'Ice' => ['ice' => 'Ice']],
                                    ['class' => 'form-control',
                                    'value' =>  isset($pokemon) ? $pokemon->tipo_pokemon : 'Rock' ]) !!}
                    </div>

                </div>
            </div>
            <div class="card-footer">
                {!! Form::button('Cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
                {!! Form::submit(  isset($pokemon) ? 'Atualizar' : 'Inserir', ['class'=>'btn btn-success btn-sm']) !!}

            </div>
        </div>

        {!! Form::close() !!}

    </div>
@endsection