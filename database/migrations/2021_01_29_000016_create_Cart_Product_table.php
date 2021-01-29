<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Cart_Product';

    /**
     * Run the migrations.
     * @table Cart_Product
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Cart_id');
            $table->integer('Product_id');
            $table->unsignedTinyInteger('quantity');

            $table->index(["Product_id"], 'fk_Carts_has_Products_Products1_idx');

            $table->index(["Cart_id"], 'fk_Carts_has_Products_Carts1_idx');


            $table->foreign('Cart_id', 'fk_Carts_has_Products_Carts1_idx')
                ->references('id')->on('Carts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Product_id', 'fk_Carts_has_Products_Products1_idx')
                ->references('id')->on('Products')
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
