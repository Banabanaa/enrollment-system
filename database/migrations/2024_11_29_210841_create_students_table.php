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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("student_number");
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('extension_name')->nullable();
            $table->string('contact_number')->nullable();
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->date('birthday')->nullable();
            $table->enum('sex', ['male', 'female', 'other'])->nullable();
            $table->enum('classification', ['regular', 'irregular', 'transferee', 'returnee']);

            $table->enum('program_id', [
                'Bachelor of Science in Computer Science',
                'Bachelor of Science in Information Technology'
            ]);

            
            $table->string("year")->nullable();
            $table->string("section")->nullable();
            $table->string("house_number")->nullable();
            $table->string("street")->nullable();
            $table->string("barangay")->nullable();
            $table->string("city")->nullable();
            $table->string("province")->nullable();
            $table->string("zip_code")->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
