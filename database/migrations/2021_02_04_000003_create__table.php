<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '';

    /**
     * Run the migrations.
     * @table 
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('country_id');
            $table->string('cp', 5);
            $table->string('nom', 50);
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();

            $table->index(["country_id"], 'fk_Cities_Countries1_idx');


            $table->foreign('country_id', 'fk_Cities_Countries1_idx')
                ->references('id')->on('countries')
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
