<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_course', function (Blueprint $table) {
            $table->foreign(['course_id'])->references(['id'])->on('courses')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_course', function (Blueprint $table) {
            $table->dropForeign('user_course_course_id_foreign');
            $table->dropForeign('user_course_user_id_foreign');
        });
    }
};
