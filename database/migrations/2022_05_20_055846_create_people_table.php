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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number_id')->unsigned()->nullable();
            $table->date('birthday');
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('health_status')->default('is ok');
            $table->enum('work', ['work', 'dont work'])->nullable();
            $table->enum('status', ['existing', 'not existing']); //موجود  ام لا
            $table->enum('category', ['mother', 'father', 'boy', 'girl']);
            $table->enum('family_status', ['single', 'married', 'separate', 'widow']);
            $table->enum('educational_level', ['امي', 'أول', 'ثاني', 'ثالث', 'رابع', 'خامس', 'سادس', 'سابع', 'ثامن', 'تاسع', 'عاشر', 'حادي عشر', 'بكلوريا', 'جامعي']);
            $table->boolean('orphan')->default(false);
            $table->text('notes')->nullable();
            $table->foreignId('entry_id');
            $table->foreignId('orphan_id')->nullable()->constrained();

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
        Schema::dropIfExists('people');
    }
};
