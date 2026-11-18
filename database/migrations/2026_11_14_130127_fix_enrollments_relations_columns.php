
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn(['name', 'email']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreignId('participant_id')
                ->after('id')
                ->constrained('participants')
                ->cascadeOnDelete();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnDelete();

            $table->string('status', 20)->default('registered');

            $table->unique(['participant_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign(['participant_id']);
            $table->dropForeign(['course_id']);
            $table->dropUnique(['participant_id', 'course_id']);
            $table->dropColumn(['participant_id', 'status']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
        });
    }
};
