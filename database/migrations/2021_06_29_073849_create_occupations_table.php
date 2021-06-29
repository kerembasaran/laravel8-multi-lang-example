<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('language_groups_id')->unsigned();
            $table->integer('occupation_group_id')->default(2);
            $table->bigInteger('phrase_id')->unsigned();
            $table->timestamps();

            $table->foreign('language_groups_id')
                ->references('id')
                ->on('language_groups')
                ->onDelete('cascade');

            $table->foreign('phrase_id')
                ->references('id')
                ->on('language_phrase_translate')
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
        Schema::dropIfExists('occupations');
    }
}
