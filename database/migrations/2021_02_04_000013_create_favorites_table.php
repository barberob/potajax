<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'favorites';

    /**
     * Run the migrations.
     * @table favorites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->integer('shop_id');

            $table->index(["user_id"], 'fk_Internaute_has_Commerce_Internaute1_idx');

            $table->index(["shop_id"], 'fk_Internaute_has_Commerce_Commerce1_idx');


            $table->foreign('user_id', 'fk_Internaute_has_Commerce_Internaute1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('shop_id', 'fk_Internaute_has_Commerce_Commerce1_idx')
                ->references('id')->on('shops')
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
