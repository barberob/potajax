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
            $table->increments('id');
            $table->string('nom', 45);
            $table->text('adresse');
            $table->float('lat');
            $table->float('lng');
            $table->text('descriptif');
            $table->string('tel', 10);
            $table->string('prefixeTel', 6);
            $table->string('email');
            $table->string('siret', 14);
            $table->text('horaires');
            $table->tinyInteger('etat');
            $table->string('codeNote', 10);
            $table->integer('city_id');
            $table->integer('subcategory_id');
            $table->integer('category_id');

            $table->index(["category_id"], 'fk_Commerce_Categorie1_idx');

            $table->index(["city_id"], 'fk_Commerce_Ville_idx');

            $table->index(["subcategory_id"], 'fk_Commerce_Type1_idx');


            $table->foreign('city_id', 'fk_Commerce_Ville_idx')
                ->references('id')->on('')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('subcategory_id', 'fk_Commerce_Type1_idx')
                ->references('id')->on('sub_categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('category_id', 'fk_Commerce_Categorie1_idx')
                ->references('id')->on('categories')
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
