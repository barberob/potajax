<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShopTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'User_Shop';

    /**
     * Run the migrations.
     * @table User_Shop
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('User_id');
            $table->integer('Shop_id');

            $table->index(["User_id"], 'fk_Internaute_has_Commerce_Internaute1_idx');

            $table->index(["Shop_id"], 'fk_Internaute_has_Commerce_Commerce1_idx');


            $table->foreign('User_id', 'fk_Internaute_has_Commerce_Internaute1_idx')
                ->references('id')->on('Users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Shop_id', 'fk_Internaute_has_Commerce_Commerce1_idx')
                ->references('id')->on('Shops')
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
