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
        Schema::create('mdical_entries', function (Blueprint $table) {
            $table->id();
            $table->string('notes')->nullable();
            $table->text('papers'); //الاوراق المطلوبة
            $table->bigInteger('phone');
            $table->string('husband_name');
            $table->string('wife_name');
            $table->string('whos'); //من المدرج ...الزوج ...الزوجة...الطفل
            $table->string('name_recipient');
            $table->date('birthday');
            $table->text('illness');
            $table->text('address');
            $table->text('session_decision');
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
        Schema::dropIfExists('mdical_entries');
    }
};
