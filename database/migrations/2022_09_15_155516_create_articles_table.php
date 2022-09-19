<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('content');
            $table->string('image', 255)->nullable(); //nullable() - указывает что столбец необязателен к заполнению
            $table->unsignedBigInteger('category_id'); //тип столбца должен быть такой же, как у столбца с которым он связан
            $table->foreign('category_id')->references('id')->on('categories'); //связываем столбцы id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
