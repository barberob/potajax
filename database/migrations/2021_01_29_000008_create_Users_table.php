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
    public $tableName = 'Users';

    /**
     * Run the migrations.
     * @table Users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nomUser', 45);
            $table->string('prenomUser', 45);
            $table->string('mailUser');
            $table->char('mdpUser', 65);
            $table->text('adresseUser')->nullable();
            $table->integer('City_insee');

            $table->index(["City_insee"], 'fk_Internaute_Ville1_idx');


            $table->foreign('City_insee', 'fk_Internaute_Ville1_idx')
                ->references('id')->on('Cities')
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
