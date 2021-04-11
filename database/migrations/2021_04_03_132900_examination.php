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
            $table->enum('hand', ['L', 'R', 'B']);
            $table->enum('spiral_type', ['Cp', 'In', 'Sp']);
            $table->string('bad_effects', 6);
            $table->date('exam_date');
            $table->time('exam_time');
            $table->text('t');
            $table->text('x');
            $table->text('y');
            $table->timestamps();

            $table->unique([
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
        Schema::dropIfExists('examinations');
    }
}
