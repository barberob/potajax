<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products';

    /**
     * Run the migrations.
     * @table products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('libelle');
            $table->text('description');
            $table->string('reference', 100);
            $table->float('prix');
            $table->integer('shop_id');
            $table->integer('unit_id');

            $table->index(["unit_id"], 'fk_Products_Units1_idx');

            $table->index(["shop_id"], 'fk_Products_Shops1_idx');


            $table->foreign('shop_id', 'fk_Products_Shops1_idx')
                ->references('id')->on('shops')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('unit_id', 'fk_Products_Units1_idx')
                ->references('id')->on('units')
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
