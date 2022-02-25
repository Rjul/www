<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montres', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('postDescription')->nullable();
            $table->string('imageUrl');
            $table->bigInteger('author');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('price');
            $table->integer('quatity');
            $table->integer('tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('montres');
    }
}
