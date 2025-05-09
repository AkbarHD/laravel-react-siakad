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
        // mahasiswa
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->foreignId('departmen_id')->constrained()->onDelete('cascade');
            // fungsi dari nullOndelete adalah ketika classroom dihapus maka student tidak ikut terhapus melainkan null
            $table->foreignId('classroom_id')->nullable()->constrained()->nullOnDelete();
            $table->string('student_number')->unique();
            $table->unsignedInteger('semester')->default(1);
            $table->year('batch');
            $table->foreignId('fee_group_id')->nullable()->constrained()->nullOnDelete();
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
