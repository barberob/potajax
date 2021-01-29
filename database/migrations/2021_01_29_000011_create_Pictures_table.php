<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Pictures';

    /**
     * Run the migrations.
     * @table Pictures
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('urlPic');
            $table->integer('Shop_id');

            $table->index(["Shop_id"], 'fk_Photo_Commerce1_idx');


            $table->foreign('Shop_id', 'fk_Photo_Commerce1_idx')
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
