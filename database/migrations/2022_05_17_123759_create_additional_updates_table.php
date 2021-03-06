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
        Schema::create('additional_updates', function (Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('person_id');
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
        Schema::dropIfExists('additional_updates');
    }
};
