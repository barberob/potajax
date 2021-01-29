<<<<<<< HEAD:database/migrations/2021_01_29_000007_create_Shops_table.php
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
    public $tableName = 'Shops';

    /**
     * Run the migrations.
     * @table Shops
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nomShop', 45);
            $table->text('adresseShop');
            $table->float('latShop');
            $table->float('lonShop');
            $table->text('descriptifShop');
            $table->string('telShop', 10);
            $table->string('prefixeTelShop', 6);
            $table->string('maiShop');
            $table->string('siretShop', 14);
            $table->text('horairesShop');
            $table->char('etatShop', 1);
            $table->string('codeNoteShop', 10);
            $table->integer('Manager_id');
            $table->integer('City_insee');
            $table->integer('SubCategory_id');
            $table->integer('Category_id');

            $table->index(["Category_id"], 'fk_Commerce_Categorie1_idx');

            $table->index(["City_insee"], 'fk_Commerce_Ville_idx');

            $table->index(["SubCategory_id"], 'fk_Commerce_Type1_idx');

            $table->index(["Manager_id"], 'fk_Commerce_Responsable1_idx');

            $table->foreign('City_insee', 'fk_Commerce_Ville_idx')
                ->references('id')->on('Cities')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('SubCategory_id', 'fk_Commerce_Type1_idx')
                ->references('id')->on('SubCategories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Category_id', 'fk_Commerce_Categorie1_idx')
                ->references('id')->on('Categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Manager_id', 'fk_Commerce_Responsable1_idx')
                ->references('id')->on('Managers')
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
