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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('lieu');
            $table->date('date');
            $table->integer('places_number');
            $table->foreignId('id_organisateur')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('validation', ['valid', 'invalid'])->default('invalid');
            $table->enum('status', ['available', 'notAvailable'])->default('available');
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
        Schema::dropIfExists('events');
    }
};
