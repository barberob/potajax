<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeratorShopTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Moderator_Shop';

    /**
     * Run the migrations.
     * @table Moderator_Shop
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Moderators_id');
            $table->integer('Shops_id');
            $table->char('etatModeration', 1);
            $table->text('motifRefus')->nullable();
            $table->dateTime('date')->nullable();

            $table->index(["Moderators_id"], 'fk_Moderators_has_Shops_Moderators1_idx');

            $table->index(["Shops_id"], 'fk_Moderators_has_Shops_Shops1_idx');


            $table->foreign('Moderators_id', 'fk_Moderators_has_Shops_Moderators1_idx')
                ->references('id')->on('Moderators')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Shops_id', 'fk_Moderators_has_Shops_Shops1_idx')
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
