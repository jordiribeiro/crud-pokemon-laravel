<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /*
     * #TIP
     * Campos editaveis
     * */
    protected $fillable = [
        'nome_pokemon',
        'treinador',
        'forca',
        'tipo_pokemon',
    ];
    /*
     * #TIP
     * Campos Não editaveis
     * */
    protected $guarded = ['id',
                          'created_at',
                          'update_at'];
    /*
     * #TIP
     * Nome da tabela
     * */
    protected $table = 'pokemons';
}
