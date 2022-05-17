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
            $table->bigInteger('husband_id_num')->unsigned();
            $table->bigInteger('wife_id_num')->unsigned();
            $table->date('entry_date', 'y-m-d'); //تاريخ الادخال
            $table->date('renewal_date', 'y-m-d')->nullable(); //تاريخ التجديد
            $table->date('finshed_date')->nullable(); //تاريخ الانتهاء
            $table->date('husband_birthday');
            $table->date('wife_birthday');
            $table->string('family_name');
            $table->string('address');
            $table->string('husband_name')->nullable();
            $table->string('wife_name')->nullable();
            $table->string('husband_health_status')->nullable();
            $table->string('wife_health_status')->nullable();
            $table->enum('wife_work', ['work', 'dont work'])->nullable();
            $table->enum('husband_work', ['work', 'dont work'])->nullable();
            $table->integer('children_num')->default(0);
            $table->integer('salary_charity')->default(0);
            $table->text('notes')->nullable();
            $table->string('family_husband_status'); //اعملا enum?
            $table->string('family_wife_status');
            $table->foreignId('id_category');
            $table->foreignId('id_status');
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
