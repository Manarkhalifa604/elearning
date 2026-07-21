<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('what_you_will_learn')->nullable()->after('about');
            $table->text('course_content')->nullable()->after('what_you_will_learn');
            $table->string('instructor_name')->nullable()->after('course_content');
            $table->string('instructor_job')->nullable()->after('instructor_name');
            $table->string('instructor_image')->nullable()->after('instructor_job');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'what_you_will_learn',
                'course_content',
                'instructor_name',
                'instructor_job',
                'instructor_image',
            ]);
        });
    }
};