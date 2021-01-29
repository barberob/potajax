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
    public $tableName = 'moderator_shop';

    /**
     * Run the migrations.
     * @table moderator_shop
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('etatModeration', 1);
            $table->text('motifRefus')->nullable();
            $table->dateTime('date')->nullable();

            $table->foreignId('Moderators_id')->constrained();

            $table->foreignId('Shops_id')->constrained();
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
