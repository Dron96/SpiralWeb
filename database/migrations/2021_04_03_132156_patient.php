<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Patient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('second_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->date('dob');
            $table->enum('sex', ['male', 'female']);
            $table->enum('dominant_hand', ['L', 'R', 'B']);
            $table->string('diagnosis');
            $table->timestamps();

            $table->unique([
                'first_name',
                'second_name',
                'middle_name',
                'dob',
                'diagnosis'
            ], 'patient_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
