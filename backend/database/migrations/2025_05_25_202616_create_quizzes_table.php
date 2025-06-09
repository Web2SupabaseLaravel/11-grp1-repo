<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('qid');
            $table->bigInteger('lesson_id');
            $table->string('title');
            $table->integer('total_mark');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
