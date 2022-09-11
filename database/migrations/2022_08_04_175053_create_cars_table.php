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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('year');
            $table->string('fuel');
            $table->string('fuel_consumption');
            $table->string('seats');
            $table->string('gearbox');
            $table->integer('price');
            $table->integer('horsepower');
            $table->integer('torque');
            $table->float('acceleration');
            $table->float('engine');
            $table->string('drivetrain');
            $table->boolean('available')->default(true);
            $table->string('images');
            $table->string('main');
            $table->longText('description');

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
        Schema::dropIfExists('cars');
    }
};
