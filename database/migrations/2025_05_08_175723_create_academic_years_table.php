<?php

use App\Enums\AcademicYearSemester;
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
        // tahun academic
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('semester')->default(AcademicYearSemester::OOD->value);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_years');
    }
};
