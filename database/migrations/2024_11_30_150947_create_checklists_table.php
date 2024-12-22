<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Correct foreign key data type
            $table->string('course_code');
            $table->enum('grade', [
                '1.00', '1.25', '1.50', '1.75', '2.00',
                '2.25', '2.50', '2.75', '3.00', '4.00', '5.00', 'INC', 'S'
            ])->nullable();
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->enum('year', ['First Year', 'Second Year', 'Third Year', 'Fourth Year']);
            $table->enum('semester', ['First Semester', 'Second Semester', 'Midyear']);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_code')->references('course_code')->on('courses')->onDelete('restrict');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
