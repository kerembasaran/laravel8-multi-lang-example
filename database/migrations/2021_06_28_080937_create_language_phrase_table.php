<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagePhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_phrase', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('description');
            $table->bigInteger('language_group_id')->unsigned();
            $table->timestamps();

            $table->foreign('language_group_id')
                ->references('id')
                ->on('language_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_phrase');
    }
}
