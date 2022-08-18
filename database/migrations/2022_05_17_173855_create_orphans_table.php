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
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();

            $table->boolean('mother_is_ok')->nullable();
            $table->bigInteger('salary_month')->default(25000); //تم تعديل بحيث يكون الراتب هو راتب الكلي على عدد اشهر الكفالة
            $table->date('begin_date', 'y-m-d');
            $table->date('end_date', 'y-m-d');
            $table->bigInteger('salary_year')->default(100000); //تم تعديل الداتا بيز بحيث يكون الراتب حسب مدة الكفالة
            $table->foreignId('type_id'); //اسم االسنوي او الشهري
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
        Schema::dropIfExists('orphans');
    }
};
