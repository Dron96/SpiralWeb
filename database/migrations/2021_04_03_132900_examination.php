<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Examination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->foreign('patient_id')->on('patients')->references('id')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->char('hand', 1);
            $table->string('spiral_type', 2);
            $table->string('bad_effects', 6);
            $table->date('exam_date');
            $table->time('exam_time');
            $table->boolean('sex');
            $table->timestamps();

            $table->index([
                'patient_id',
                'exam_date',
                'exam_time'
            ], 'exam_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
