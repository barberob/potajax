<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shops';

    /**
     * Run the migrations.
     * @table shops
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id()->unique();
            $table->string('nom', 45);
            $table->text('adresse');
            $table->string('cp');
            $table->string('numRue');
            $table->float('lat');
            $table->float('lng');
            $table->text('descriptif');
            $table->string('tel', 10);
            $table->string('prefixeTel', 6);
            $table->string('email');
            $table->string('siret', 14);
            $table->text('horaires');
            $table->tinyInteger('etat');
            $table->string('codeNote', 10)->nullable();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('category_id')->constrained();

            $table->timestamps();
            $table->softDeletes();
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
