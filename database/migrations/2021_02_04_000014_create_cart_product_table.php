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
    public $tableName = 'cart_product';

    /**
     * Run the migrations.
     * @table cart_product
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cart_id');
            $table->integer('product_id');
            $table->unsignedTinyInteger('quantity');

            $table->index(["product_id"], 'fk_Carts_has_Products_Products1_idx');

            $table->index(["cart_id"], 'fk_Carts_has_Products_Carts1_idx');


            $table->foreign('cart_id', 'fk_Carts_has_Products_Carts1_idx')
                ->references('id')->on('carts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('product_id', 'fk_Carts_has_Products_Products1_idx')
                ->references('id')->on('products')
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
