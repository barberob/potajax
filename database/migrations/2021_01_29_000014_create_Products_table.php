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
    public $tableName = 'Products';

    /**
     * Run the migrations.
     * @table Products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('libProd');
            $table->text('descProd');
            $table->string('refProd', 100);
            $table->float('prixProd');
            $table->integer('Shop_id');
            $table->integer('Unit_id');

            $table->index(["Unit_id"], 'fk_Products_Units1_idx');

            $table->index(["Shop_id"], 'fk_Products_Shops1_idx');


            $table->foreign('Shop_id', 'fk_Products_Shops1_idx')
                ->references('id')->on('Shops')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Unit_id', 'fk_Products_Units1_idx')
                ->references('id')->on('Units')
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
