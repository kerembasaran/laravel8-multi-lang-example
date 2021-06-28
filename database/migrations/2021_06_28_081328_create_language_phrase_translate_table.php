<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagePhraseTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_phrase_translate', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('description');
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('phrase_id')->unsigned();
            $table->timestamps();


            $table->foreign('language_id')
                ->references('id')
                ->on('language')
                ->onDelete('cascade');

            $table->foreign('phrase_id')
                ->references('id')
                ->on('language_phrase')
                ->onDelete('cascade');

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_phrase_translate');
    }
}
