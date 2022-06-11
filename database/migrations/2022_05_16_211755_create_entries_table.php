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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diwan_num')->unsigned();
            $table->bigInteger('registration_num')->unsigned();
            $table->bigInteger('smartCard_num')->unsigned();
            $table->bigInteger('phone_num')->unsigned();
            $table->date('entry_date', 'y-m-d'); //تاريخ الادخال
            $table->date('renewal_date', 'y-m-d')->nullable(); //تاريخ التجديد
            $table->date('finshed_date')->nullable(); //تاريخ الانتهاء
            $table->string('family_name');
            $table->text('address');
            //////الفئة

            $table->boolean('all_orphan')->default(false);
            $table->integer('family_num')->default(0);
            $table->integer('salary_charity')->default(0);

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
        Schema::dropIfExists('entries');
    }
};
