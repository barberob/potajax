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

            $table->integer('city_id')->unsigned();

            $table->foreignId('subcategory_id')->constrained();

            $table->foreignId('category_id')->constrained();

            $table->foreignId('manager_id')->constrained();


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
