<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom', 45);
            $table->string('prenom', 45);
            $table->string('email');
            $table->char('mdp', 65);
            $table->text('adresse')->nullable();
            $table->string('prefixtel', 10)->nullable();
            $table->string('tel', 20)->nullable();
            $table->tinyInteger('role');
            $table->integer('city_Id');

            $table->index(["city_Id"], 'fk_Internaute_Ville1_idx');


            $table->foreign('city_Id', 'fk_Internaute_Ville1_idx')
                ->references('id')->on('')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
