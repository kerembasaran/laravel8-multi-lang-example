<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('occupation_id')->unsigned();
            $table->bigInteger('office_id')->unsigned();
            $table->bigInteger('phrase_id')->unsigned();
            $table->tinyInteger('first_question')->default(0);
            $table->timestamps();

            $table->foreign('occupation_id')
                ->references('id')
                ->on('occupations')
                ->onDelete('cascade');

            $table->foreign('office_id')
                ->references('id')
                ->on('offices')
                ->onDelete('cascade');

            /*$table->foreign('phrase_id')
                ->references('id')
                ->on('language_phrase_translate')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_questions');
    }
}
