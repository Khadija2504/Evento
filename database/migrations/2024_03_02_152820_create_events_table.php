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
            $table->string('image');
            $table->foreignId('id_organisateur')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('validation', ['valid', 'invalid', 'notYet'])->default('notYet');
            $table->enum('status', ['available', 'notAvailable'])->default('available');
            $table->enum('acceptation', ['auto', 'manuelle'])->default('auto');
            $table->softDeletes();
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
