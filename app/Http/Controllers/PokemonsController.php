<?php

namespace App\Http\Controllers;


use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    /**
     * Lista todos os registros da tabela
     * Pokemon ordenando pelo campo força
     * ## paginate para fazer a paginação no front
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon::orderBy('forca', 'desc')->paginate(5);
        return view('pokemons.list', compact('pokemons'));
    }

    /**
     * Retorna a criação do form.blade.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemons.form');
    }

    /**
     * Insere um registro na base, se já existir um pokemon que tenha treinador igual ao inserido
     * é lançada um execção sql e capturada no catch , apos isto é retornada uma view de erro
     * para o usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $pokemon = Pokemon::create($request->all());
            if($pokemon)
                return redirect()->route('pokemons.index');

        }
        catch (\Exception $e){
            $ret=$e->getCode();
            if($ret=2300)
                return view('pokemons.erro');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *  Edita o pokemon filtrando pelo ID que é selecionado no botão
     * na view de listagem
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        if ($pokemon)
            return view('pokemons.form', compact('pokemon'));
        else
            return redirect()->back();
    }

    /**
     * Atualiza o pokemon utilizando como parametro o ID,
     * o Objeto pokemon é montado e salvo, apos isto é retornado
     * para a view principal
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->nome_pokemon = $request->nome_pokemon;
        $pokemon->treinador= $request->treinador;
        $pokemon->forca = $request->forca;
        $pokemon->tipo_pokemon = $request->tipo_pokemon;
        $pokemon->save();
        return redirect()->route('pokemons.index');
    }

    /**
     * Deleta o pokemon utilizando o campo ID para realizar a operação
     * na view é lançada um pop-up peguntando se o usuário deseja realmente
     * excluir o registro, se o utilizador apertar OK o registro é deletaqdo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon = Pokemon::where('id', $id)->delete();
        return redirect()->route('pokemons.index');
    }
}
