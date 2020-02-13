<?php
/*
 * Migration criada por Jordi Ribeiro
 *  #Tip
 *  Migration criada utilizando comando "php artisan make:model Models\\Pokemon -m"
 *  Também poderia ser criada utilizando "php artisan make:migration create_pokemon_table"
 * */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Cria tabela poke
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_pokemon',45);
            // A ideia é que só possa existir um treinador na base
            $table->string('treinador',100)->unique();
            $table->integer('forca');
            $table->string('tipo_pokemon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Deleta  tabela poke
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
