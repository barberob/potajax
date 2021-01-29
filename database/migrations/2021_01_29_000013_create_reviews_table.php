<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reviews';

    /**
     * Run the migrations.
     * @table reviews
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Shops_id');
            $table->integer('Users_id');
            $table->text('messageReview');
            $table->float('noteReview');

            $table->index(["Shops_id"], 'fk_Shops_has_Users_Shops1_idx');

            $table->index(["Users_id"], 'fk_Shops_has_Users_Users1_idx');


            $table->foreign('Shops_id', 'fk_Shops_has_Users_Shops1_idx')
                ->references('id')->on('shops')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Users_id', 'fk_Shops_has_Users_Users1_idx')
                ->references('id')->on('users')
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
