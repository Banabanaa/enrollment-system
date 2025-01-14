<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCourseChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_checklist', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); 
            $table->string('course_code'); 
            $table->foreign('course_code')->references('course_code')->on('courses')->onDelete('cascade'); 
            $table->string('sy_taken'); 
            $table->string('instructor'); 
            $table->decimal('final_grade', 5, 2)->nullable();
            $table->boolean('checklist_status')->default(false); // If submitted or not
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_course_checklist');
    }
}
